<?php

namespace App\Http\Controllers\evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company_datum;
use App\Models\Provider_type;
use App\Models\city;
use App\Models\Event;
use App\Models\Quotation;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PDF;

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

    public function pago()
    {
        return view('evento.payment');
    }
    public function gestion()
    {
        $deportes = sport::all();
        $ciudades = city::all();
        $proveedores = Provider_type::all();
        return view('evento.gestion', compact('proveedores', 'ciudades', 'deportes'));
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
    public function openpay()
    {
        return view('evento.openpay');
    }
}
