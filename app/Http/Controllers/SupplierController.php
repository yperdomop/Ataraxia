<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function evento()
    {
        return view('supplier.evento');
    }

    public function cotizacion()
    {
        return view('supplier.cotizacion');
    }
}
