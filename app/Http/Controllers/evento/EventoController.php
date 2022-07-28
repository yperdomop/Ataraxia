<?php

namespace App\Http\Controllers\evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company_datum;
use App\Models\Provider_type;

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
        $url = "https://www.google.com/maps/embed/v1/place?key=" . env('GOOGLE_API_KEY') . '&q=' . Str::slug($request->escenario, '+') . ',' . $request->ciudad . '+Colombia';
        return view('evento.cotizacion', compact('url'));
    }

    public function pago()
    {
        return view('evento.payment');
    }
    public function gestion()
    {
        $proveedores = Provider_type::all();
        return view('evento.gestion', compact('proveedores'));
    }
    public function cotizacion()
    {
        return view('evento.cotizacion');
    }
}
