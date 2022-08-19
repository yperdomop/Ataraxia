<?php

namespace App\Http\Controllers\evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company_datum;
use App\Models\Provider_type;
use App\Models\city;
use App\Models\Sport;

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
        $ciudad = City::find($request->ciudad);
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
    /* pendiente formulario de gestión
    public function GuardarProveedor(Request $request)
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
    } */


    public function cotizacion()
    {
        return view('evento.cotizacion');
    }
    public function openpay()
    {
        return view('evento.openpay');
    }
}
