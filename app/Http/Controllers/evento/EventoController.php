<?php

namespace App\Http\Controllers\evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company_datum;
use App\Models\Provider_type;
use App\Models\city;
use App\Models\Event;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index()
    {
        return view('evento.home');
    }

    public function seleccion()
    {
        return view('evento.seleccion');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            "nombre" => "required",
            "ciudad" => "required",
            "fecha" => "required",
            "origen" => "required",
            "deporte" => "required",
            "escenario" => "required",
            "transporte" => "required",
            "proveedor" => "required",
        ]);
        //return Auth::user()->company_datum_id;
        $ciudad = City::find($request->ciudad);
        $envent = Event::create([
            'name' => $request->nombre,
            'company_datum_id' => Auth::user()->company_datum_id,
            'date' => $request->fecha,
            'address' => $request->escenario,
            'city_from_id' => $request->origen,
            'city_to_id' => $request->ciudad,
            'registred' => Auth::user()->email,
            'adult_passengers' => $request->adultos,
            'child_passengers' => $request->ninos,
            'transport' => $request->transporte,
            'observation' => $request->observacion
        ]);
        $url = "https://www.google.com/maps/embed/v1/place?key=" . env('GOOGLE_API_KEY') . '&q=' . Str::slug($request->escenario, '+') . ',' . $ciudad->name . '+' . $ciudad->department->country->name;
        return view('evento.cotizacion', compact('url'));
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

    public function cotizacion()
    {
        return view('evento.cotizacion');
    }
    public function openpay()
    {
        return view('evento.openpay');
    }
}
