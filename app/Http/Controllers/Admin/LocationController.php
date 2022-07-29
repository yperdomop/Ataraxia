<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//modelo
use App\Models\Country;
use App\Models\City;
use App\Models\departments;
use PHPUnit\Framework\Constraint\Count;

class LocationController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.localizaciones.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.localizaciones.create');
    }

    public function store(Request $request)
    {
        Country::create($request->all());
        return redirect()->route('admin.localizaciones.index')->with('info', 'Locación creada con éxito');
    }

    public function show(Country $country)
    {
        return view('admin.localizaciones.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('admin.localizaciones.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $country->update($request->all());

        return redirect()->route('admin.localizaciones.show', $country)->with('info', 'Locación editada con éxito');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('admin.localizaciones.index')->with('info', 'Locación eliminada con éxito');
    }
}
