<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    public function create(Country $country)
    {
        return view('admin.localizaciones.departamentos.create', compact('country'));
    }

    public function store(Request $request, Country $country)
    {
        Department::create($request->all());

        return redirect()->route('admin.localizaciones.show', $country)->with('info', 'Departamento creado con éxito');
    }

    public function show(Country $country, Department $department)
    {
        return view('admin.localizaciones.departamentos.show', compact('country', 'department'));
    }


    public function edit(Country $country, Department $department)
    {
        return view('admin.localizaciones.departamentos.edit', compact('country', 'department'));
    }


    public function update(Request $request, Country $country, Department $department)
    {
        $department->update($request->all());

        return redirect()->route('admin.localizaciones.show', $country)->with('info', 'Departamento editado con éxito');
    }

    public function destroy(Country $country, Department $department)
    {
        $department->delete();

        return redirect()->route('admin.localizaciones.show', $country)->with('info', 'Departamento eliminado con éxito');
    }
}
