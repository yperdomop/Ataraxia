<?php

namespace App\Http\Controllers\Fintech;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        return view('fintech.evento.cotizacion');
    }
}
