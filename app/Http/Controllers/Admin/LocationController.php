<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//modelo
use App\Models\Country;
use App\Models\City;
use App\Models\departments;

class LocationController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $cities = City::all();
        $departments = departments::all();
        return view('admin.localizaciones.index', compact('countries', 'cities', 'departments'));
    }
}
