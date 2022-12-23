<?php

namespace App\Http\Controllers\evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company_datum;
use App\Models\Provider_type;
use App\Models\City;
use App\Models\Event;
use App\Models\Quotation;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PDF;
use Openpay\Data\Openpay;

class EventoController extends Controller
{
    public function index()
    {
        return view('evento.home');
    }
    public function lista()
    {
        return view('evento.lista');
    }
    public function pdf(Quotation $cotizacion)
    {

        $pdf = PDF::loadView('supplier.pdf', compact('cotizacion'));

        return $pdf->stream('cotizacion.pdf');
    }

    public function seleccion()
    {
        return view('evento.seleccion');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            "nombre" => "required|unique:events,name",
            "ciudad" => "required",
            "fecha" => "required",
            "origen" => "required",
            "deporte" => "required",
            "escenario" => "required",
            "transporte" => "required",
            "proveedor" => "required",
        ]);
        $ciudad = City::find($request->ciudad);
        $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->escenario, '+') . ',' . Str::slug($ciudad->name, '+') . ',' . Str::slug($ciudad->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
        $result = json_decode($result);
        $coordenadas = $result->results[0]->geometry->location;

        $event = Event::create([
            'name' => $request->nombre,
            'company_datum_id' => Auth::user()->company_datum_id,
            'date' => $request->fecha,
            'address' => $request->escenario,
            'lat' => $coordenadas->lat,
            'lng' => $coordenadas->lng,
            'city_from_id' => $request->origen,
            'city_to_id' => $request->ciudad,
            'sport_id' => $request->deporte,
            'registred' => Auth::user()->email,
            'adult_passengers' => $request->adultos,
            'child_passengers' => $request->ninos,
            'transport' => $request->transporte,
            'observation' => $request->observacion
        ]);

        $event->providerTypes()->attach($request->proveedor);
        return redirect()->route('evento.cotizacion', $event);
    }

    public function comparar()
    {

        return view('evento.comparar');
    }

    public function pago(Request $request)
    {
        $cotizacion = json_decode($request->cotizacion);
        $company = Company_datum::find($cotizacion->company_datum_id);
        return view('evento.payment', compact('cotizacion', 'company'));
    }

    public function gestion()
    {
        $deportes = sport::all();
        $ciudades = City::all();
        $proveedores = Provider_type::all();
        return view('evento.gestion', compact('proveedores', 'ciudades', 'deportes'));
    }

    public function Organizar()
    {
        $deportes = sport::all();
        $ciudades = City::all();
        $proveedores = Provider_type::all();
        return view('evento.organizar', compact('proveedores', 'ciudades', 'deportes'));
    }

    public function cotizacion(Event $evento)
    {
        return view('evento.cotizacion', compact('evento'));
    }
    public function eliminar(Event $evento)
    {
        $evento->delete();
        return redirect()->route('evento.lista');
    }

    public function openpay($cotizacion)
    {
        return view('evento.openpay');
    }

    public function enviarPago(Request $request, $cotizacion)
    {
        $quotation = Quotation::find($cotizacion);
        //instancia openpay
        $openpay = Openpay::getInstance(env('OPENPAY_ID'), env('OPENPAY_SK'), 'CO');
        Openpay::setProductionMode(false);
        //creación usuario openpay
        $customer = [
            'name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'phone_number' => '6017415658',  //$Auth::user()->company->phone,
            'email' => Auth::user()->email,
        ];
        //creación de cargos en openpay
        $chargeData = [
            'method' => 'card',
            'source_id' => $request->token_id,
            'amount' => $quotation->price,
            'currency' => 'COP',
            'description' => 'Cotización ' . $quotation->company->bussiness_name,
            'device_session_id' => $request->deviceIdHiddenFieldName,
            'customer' => $customer
        ];
        $charge = $openpay->charges->create($chargeData);

        return redirect()->route('evento.lista')->with('info', '¡¡Hola ' . Auth::user()->first_name . '!!<br> Se ha realizado el pago exitosamente de la cotización.');
    }
}
