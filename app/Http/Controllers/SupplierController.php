<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index');
    }

    public function evento()
    {
        $events = Event::whereHas('providerTypes', function (Builder $query) {
            return $query->where('provider_type_id', Auth::user()->company->provider_type_id);
        })->where('city_to_id', Auth::user()->company->city_id)->get();
        return view('supplier.evento', compact('events'));
    }
}
