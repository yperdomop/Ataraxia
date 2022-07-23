<?php

namespace App\Http\Controllers\Fintech;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('fintech.index');
    }
}
