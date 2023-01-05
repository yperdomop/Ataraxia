<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permission::all();
        return view('admin.permisos.index', compact('permisos'));
    }

    public function create()
    {
        return view('admin.permisos.create');
    }


    public function store(Request $request)
    {
        $permisos = Permission::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.permisos.index')->with('info', 'Permiso creado con éxito');
    }


    public function show($id)
    {
        //
    }

    public function edit(Permission $permiso)
    {
        return view('admin.permisos.edit', compact('permiso'));
    }

    public function update(Request $request, Permission $permiso)
    {
        $permiso->update($request->all());
        return redirect()->route('admin.permisos.index')->with('info', 'Permiso actualizado con éxito');
    }


    public function destroy(Permission $permiso)
    {
        $permiso->delete();

        return redirect()->route('admin.permisos.index')->with('info', 'Permiso eliminado con éxito');
    }
}
