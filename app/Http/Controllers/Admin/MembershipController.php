<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Modelos
use App\Models\Membership_price;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership_price::all();
        return view('admin.membresias.index', compact('memberships'));
    }
}
