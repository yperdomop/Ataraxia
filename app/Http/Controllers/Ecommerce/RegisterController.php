<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Mail\confiproveedorMailable;
use App\Mail\ConfirmacionMailable;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Payment_frequency;
use App\Models\Sport;
use App\Models\User;
use App\Models\Company_datum;
use Spatie\Permission\Models\Role;
use App\Models\Purchase_datum;
use App\Models\Membership_price;
use App\Models\provider_type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Openpay\Data\Openpay;

class RegisterController extends Controller
{

    public function Membership()
    {
        $membresias = Role::where('id', '>=', '3')->where('type', 'Comercial')->get();
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
            'cedula' => 'required|string',
            'telefono' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'email' => 'required|email|unique:users',
            'periodo' => 'required',
            'ciudad' => 'required',
            'deporte' => 'required'
        ]);
        //buscar id rol
        $rol = Role::where('name', $request->membership)->first();
        //buscar precio
        $precio = Membership_price::where('role_id', $rol->id)->where('payment_frequency_id', $request->periodo)->first();
        //crear compañia
        $compania = Company_datum::create([
            'bussiness_name' => $request->razon,
            'registred' => 'SYS',
            'language' => 'es',
            'legal_representative' => $request->nombre . " " . $request->apellido,
            'legal_representative_document' => $request->cedula,
            'nit' => $request->nit,
            'address' => $request->direccion,
            'phone' => $request->telefono,
            'city_id' => $request->ciudad,
            'email' => $request->email,
            'sport_id' => $request->deporte,
        ]);

        //crear usuario
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

        $compra = Purchase_datum::create([
            'company_datum_id' => $compania->id,
            'price' => $precio->price,
            'membership_price_id' => $precio->id,
            'registred' => 'SYS',
        ]);

        return redirect()->route('ecommerce.summary', $compania);
    }

    public function summary($compania)
    {
        $company = Company_datum::find($compania);
        return view('ecommerce.summary', compact('company'));
    }

    public function edit(Company_datum $company)
    {
        $ciudades = City::all();
        $frecuencias = Payment_frequency::all();
        $deportes = Sport::all();
        return view('ecommerce.edit', compact('company', 'ciudades', 'frecuencias', 'deportes'));
    }

    public function update(Request $request, Company_datum $company)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s]+$/u',
            'apellido' => 'required|regex:/^[\pL\s]+$/u',
            'cedula' => 'required|string',
            'telefono' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'email' => 'required|email|unique:users,email,' . $company->users->first()->id,
            'periodo' => 'required',
            'ciudad' => 'required',
            'deporte' => 'required'
        ]);

        //buscar usuario
        $usuario = $company->users->first();
        //buscar id rol
        $rol = $usuario->roles->first();
        //buscar precio
        $precio = Membership_price::where('role_id', $rol->id)->where('payment_frequency_id', $request->periodo)->first();

        $company->update([
            'bussiness_name' => $request->razon,
            'registred' => 'SYS',
            'language' => 'es',
            'legal_representative' => $request->nombre . " " . $request->apellido,
            'legal_representative_document' => $request->cedula,
            'nit' => $request->nit,
            'address' => $request->direccion,
            'phone' => $request->telefono,
            'city_id' => $request->ciudad,
            'email' => $request->email,
            'sport_id' => $request->deporte,
        ]);


        $usuario->update([
            'company_datum_id' => $company->id,
            'first_name' => $request->nombre,
            'last_name' => $request->apellido,
            'email' => $request->email,
            'status' => 'inactivo',
            'username' => $request->email,
            'city_id' => $request->ciudad,
            'phone' => $request->telefono,
            'identification_document' => $request->cedula,
            'registred' => 'SYS'
        ]);

        //buscar datos de compra
        $compra = $company->purchases->last();
        $compra->update([
            'company_datum_id' => $company->id,
            'price' => $precio->price,
            'membership_price_id' => $precio->id,
            'registred' => 'SYS',
        ]);


        return redirect()->route('ecommerce.summary', $company);
    }

    public function payment($compania)
    {
        $company = Company_datum::find($compania);
        return view('ecommerce.payment', compact('company'));
    }

    public function supplier()
    {
        $ciudades = City::all();
        $proveedores = provider_type::all();
        return view('ecommerce.supplier', compact('ciudades', 'proveedores'));
    }

    public function storageSupplier(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s]+$/u',
            'apellido' => 'required|regex:/^[\pL\s]+$/u',
            'cedula' => 'required|string',
            'telefono' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'email' => 'required|email|unique:users',
            'ciudad' => 'required',
            'razon' => 'required',
            'proveedor' => 'required'
        ]);
        $compania = Company_datum::create([
            'bussiness_name' => $request->razon,
            'registred' => 'SYS',
            'language' => 'es',
            'legal_representative' => $request->nombre . " " . $request->apellido,
            'legal_representative_document' => $request->cedula,
            'nit' => $request->nit,
            'address' => $request->direccion,
            'phone' => $request->telefono,
            'city_id' => $request->ciudad,
            'email' => $request->email,
            'provider_type_id' => $request->proveedor,

        ]);
        $usuario = User::create([
            'company_datum_id' => $compania->id,
            'first_name' => $request->nombre,
            'last_name' => $request->apellido,
            'email' => $request->email,
            'status' => 'activo',
            'username' => $request->email,
            'password' => bcrypt($request->cedula),
            'city_id' => $request->ciudad,
            'phone' => $request->telefono,
            'identification_document' => $request->cedula,
            'registred' => 'SYS'
        ])->assignRole('proveedor');

        //notificación al correo
        $correo = new confiproveedorMailable($usuario);
        Mail::to($usuario->email)->send($correo);

        return redirect()->route('login')->with('info', '<p>¡¡Hola ' . $usuario->first_name . '!!<br> Usted se ha registrado exitosamente, su usuario y contraseña se ha enviado a su correo.</p>');
    }

    public function openpay($compania)
    {
        $company = Company_datum::find($compania);
        return view('ecommerce.openpay', compact('company'));
    }

    public function enviarPago(Request $request, $compania)
    {
        $company = Company_datum::find($compania);
        //instancia openpay
        $openpay = Openpay::getInstance(env('OPENPAY_ID'), env('OPENPAY_SK'), 'CO');
        Openpay::setProductionMode(false);
        //creación usuario openpay
        $customer = [
            'name' => $company->users->first()->first_name,
            'last_name' => $company->users->first()->last_name,
            'phone_number' => '6017415658',  //$company->phone,
            'email' => $company->email,
        ];
        //creación de cargos en openpay
        $chargeData = [
            'method' => 'card',
            'source_id' => $request->token_id,
            'amount' => ($company->purchases->last()->price / 10),
            'currency' => 'COP',
            'description' => 'Compra de membresia Ataraxia ' . $company->users->first()->getRoleNames()->first(),
            'device_session_id' => $request->deviceIdHiddenFieldName,
            'customer' => $customer
        ];
        $charge = $openpay->charges->create($chargeData);
        //actualizacion de pago bd
        $meses = $company->purchases->last()->membership->payment->meses;
        $today = Carbon::now();
        $company->purchases->last()->update([
            'purchase_date' => Carbon::now(),
            'expiration_date' => $today->addMonths($meses),
        ]);
        //activación de usuario bd
        $company->users->first()->update(['status' => 'activo']);
        //notificación al correo
        $correo = new ConfirmacionMailable($company->users->first());
        Mail::to($company->users->first()->email)->send($correo);

        return redirect()->route('login')->with('info', '<p>¡¡Hola ' . $company->users->first()->first_name . '!!<br> Se ha realizado el pago exitosamente, su usuario y contraseña se ha enviado a su correo.</p>');
    }
}
