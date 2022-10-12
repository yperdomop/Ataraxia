<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Modelos
use App\Models\Membership_price;
use App\Models\Payment_frequency;
use Spatie\Permission\Models\Role;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership_price::all();
        return view('admin.membresias.index', compact('memberships'));
    }
    public function create()
    {
        $pagos = Payment_frequency::all();
        $roles = Role::where('id', '>=', '3');
        return view('admin.membresias.create', compact('pagos', 'roles'));
    }
    public function store(Request $request)
    {
        Membership_price::create([
            'payment_frequency_id' => $request->pago,
            'role_id' => $request->role,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.memberships.index')->with('info', 'Membresía creada con éxito');
    }


    public function edit(Membership_price $membership)
    {
        $pagos = Payment_frequency::all();
        $roles = Role::where('id', '>=', '3');

        return view('admin.membresias.edit', compact('membership', 'pagos', 'roles'));
    }
    public function update(Request $request, Membership_price $membership)
    {
        $membership->update([
            'payment_frequency_id' => $request->pago,
            'role_id' => $request->role,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.memberships.index')->with('info', 'Membresía actualizada con éxito');
    }
    public function destroy(Membership_price $membership)
    {
        $membership->delete();

        return redirect()->route('admin.memberships.index')->with('info', 'Membresía eliminada con éxito');
    }
}
