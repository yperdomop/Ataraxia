<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function Membership()
    {
        return view('ecommerce.membership');
    }

    public function Register($membership)
    {
        return view('ecommerce.register', compact('membership'));
    }


    public function summary(Request $request)
    {

        $membership = $request->all();
        return view('ecommerce.summary', compact('membership'));
    }
}
