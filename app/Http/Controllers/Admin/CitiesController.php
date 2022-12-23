<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function create(Department $department)
    {
        return view('admin.localizaciones.departamentos.ciudades.create', compact('department'));
    }

    public function store(Request $request, Department $department)
    {
        City::create($request->all());

        return redirect()->route('admin.departamentos.show', [$department->country, $department]);
    }

    public function edit(department $department, City $city)
    {

        return view('admin.localizaciones.departamentos.ciudades.edit', compact('department', 'city'));
    }

    public function update(Request $request, Department $department, City $city)
    {
        $city->update($request->all());

        return redirect()->route('admin.departamentos.show', [$department->country, $department]);
    }

    public function destroy(Department $department, City $city)
    {
        $city->delete();

        return redirect()->route('admin.departamentos.show', [$department->country, $department]);
    }
}
