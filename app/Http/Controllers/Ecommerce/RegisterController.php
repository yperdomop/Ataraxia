<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Payment_frequency;
use App\Models\Sport;
use App\Models\User;
use App\Models\Company_datum;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{

    public function Membership()
    {
        $membresias = Role::where('id', '>=', '3')->get();
        return view('ecommerce.membership', compact('membresias'));
    }

    public function Register($membership)
    {
        $ciudades = City::all();
        $frecuencias = Payment_frequency::all();
        $deportes = Sport::all();
        return view('ecommerce.register', compact('membership', 'ciudades', 'frecuencias', 'deportes'));
    }

    public function Storage(Request $request)
    {

        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s]+$/u',
            'apellido' => 'required|regex:/^[\pL\s]+$/u',
            'cedula' => 'required|integer',
            'telefono' => 'required|integer',
            'direccion' => 'required',
            'email' => 'required|email|unique:users',
            'periodo' => 'required',
            'ciudad' => 'required',
            'deporte' => 'required'
        ]);

        $compania = Company_datum::create([
            'bussiness_name' => $request->razon ? $request->razon : ($request->nombre . " " . $request->apellido),
            'registred' => 'SYS',
            'language' => 'es',
            'legal_representative' => $request->nombre . " " . $request->apellido,
            'legal_representative_document' => $request->cedula,
            'nit' => $request->nit ? $request->nit : $request->cedula,
            'address' => $request->direccion,
            'phone' => $request->telefono,
            'city_id' => $request->ciudad,
            'email' => $request->email,
            'sport_id' => $request->deporte,
        ]);

        $usuario = User::create([
            'company_datum_id' => $compania->id,
            'first_name' => $request->nombre,
            'last_name' => $request->apellido,
            'email' => $request->email,
            'status' => 'inactivo',
            'username' => $request->email,
            'password' => bcrypt($request->cedula),
            'city_id' => $request->ciudad,
            'phone' => $request->telefono,
            'identification_document' => $request->cedula,
            'registred' => 'SYS'
        ])->assignRole($request->membership);

        return redirect()->route('ecommerce.summary', $compania);
    }


    public function summary($compania)
    {
        $company = Company_datum::find($compania);
        return view('ecommerce.summary', compact('company'));
    }
    public function payment()
    {
        
        return view('ecommerce.payment');
    }
}
