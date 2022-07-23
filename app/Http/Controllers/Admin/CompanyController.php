<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\company_datum;
use App\Models\Sport;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = company_datum::all();
        return view('admin.compania.index', compact('companies'));
    }

    //Mostrar formulario de creación
    public function create()
    {
        $ciudades = City::all();
        $deportes = Sport::all();
        return view('admin.compania.create', compact('ciudades', 'deportes'));
    }

    // Guardar en BD
    public function store(Request $request)
    {

        $request->validate(rules: [
            'bussiness_name' => 'required',
            'language' => 'nullable',
            'postal_code' => 'nullable',
            'legal_representative' => 'required',
            'legal_representative_document' => 'required',
            'nit' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'city_id' => 'required',
            'email' => 'required',
            'sport_id' => 'required',

        ]);
        $companies = company_datum::create(
            $request->all()
        );
        return redirect()->route('admin.compania.index')->with('info', 'Compañía creada con éxito');
    }


    public function show($id)
    {
        //
    }
    //Editar

    public function edit(Company_datum $companium)
    {
        $ciudades = City::all();
        $deportes = Sport::all();
        return view('admin.compania.edit', compact('ciudades', 'deportes', 'companium'));
    }

    //Actualizar en BD
    public function update(Request $request, Company_datum $companium)
    {
        $companium->update($request->all());
        return redirect()->route('admin.compania.index')->with('info', 'Compañía actualizada con éxito');
    }


    public function destroy($companium)
    {
        $company = Company_datum::find($companium);
        $company->delete();
        return redirect()->route('admin.compania.index')->with('info', 'Compañía eliminado con éxito');
    }
}
