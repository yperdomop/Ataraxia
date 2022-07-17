<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//modelo
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    //Mostrar formulario de creación
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    // Guardar en BD
    public function store(Request $request)
    {

        $request->validate(rules: [
            'first_name' => 'required',
            'email' => 'required',
            'last_name' => 'required',

        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'status' => 'activo',
            /* 'company_datum_id'=>$request->company_datum_id,
            'city_id'=>$request->city_id,
            'phone'=>$request->phone,
            'identification_document'=>$request->identification_document,
            'gender'=> $request->gender,
            'birth_date'=> $request->birth_date, */

        ])->syncRoles($request->roles);
        return redirect()->route('admin.users.index')->with('info', 'Usuario creado con éxito');
    }

    //Editar
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    //Actualizar en BD
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('info', 'Usuario actualizado con éxito');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('info', 'Usuario eliminado con éxito');
    }
}
