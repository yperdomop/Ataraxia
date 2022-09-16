<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Event;
use App\Models\Quotation;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
//modelos
use App\Models\Company_datum;

class QuotationController extends Controller
{

    public function index(Event $event)
    {
        return view('supplier.cotizaciones', compact('event'));
    }

    public function create(Event $event)
    {
        return view('supplier.cotizacion', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        return $request;
        $total = $request->valor_hotel + $request->valor_restaurante + $request->valor_transporte + $request->valor_logistica + $request->valor_insumo;
        $file = '';

        if ($request->file('file')) {
            $file = Storage::put('cotizaciones', $request->file('file'));
        }

        $quotation = Quotation::create([
            'price' => $total,
            'date' => Carbon::now(),
            'route' => $file,
            'company_datum_id' => Auth::user()->company_datum_id,
            'location' => Auth::user()->company->address,
            'event_id' => $event->id,
        ]);

        if ($request->nombre_hotel) {
            $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->ubicacion_hotel, '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
            $result = json_decode($result);
            $coordenadas = $result->results[0]->geometry->location;
            Detail::create([
                'service_type' => 'Hotel',
                'Property_name' => $request->nombre_hotel,
                'price' => $request->valor_hotel,
                'location' => $request->ubicacion_hotel,
                'lat' => $coordenadas->lat,
                'lng' => $coordenadas->lng,
                'description' => $request->descripcion_hotel,
                'quotation_id' => $quotation->id,
            ]);
        }

        if ($request->nombre_restaurante) {
            $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->ubicacion_restaurante, '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
            $result = json_decode($result);
            $coordenadas = $result->results[0]->geometry->location;
            Detail::create([
                'service_type' => 'Restaurante',
                'Property_name' => $request->nombre_restaurante,
                'price' => $request->valor_restaurante,
                'location' => $request->ubicacion_restaurante,
                'lat' => $coordenadas->lat,
                'lng' => $coordenadas->lng,
                'description' => $request->descripcion_restaurante,
                'quotation_id' => $quotation->id,
            ]);
        }

        if ($request->nombre_transporte) {
            Detail::create([
                'service_type' => 'Transporte',
                'Property_name' => $request->nombre_transporte,
                'price' => $request->valor_transporte,
                'description' => $request->descripcion_transporte,
                'quotation_id' => $quotation->id,
                'transport_type' => $request->tipo_transporte,
            ]);
        }

        if ($request->nombre_logistica) {
            $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->ubicacion_logistica, '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
            $result = json_decode($result);
            $coordenadas = $result->results[0]->geometry->location;
            Detail::create([
                'service_type' => 'Logistica',
                'Property_name' => $request->nombre_logistica,
                'price' => $request->valor_logistica,
                'location' => $request->ubicacion_logistica,
                'lat' => $coordenadas->lat,
                'lng' => $coordenadas->lng,
                'description' => $request->descripcion_logistica,
                'quotation_id' => $quotation->id,
            ]);
        }

        if ($request->nombre_insumo) {
            $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->nombre_insumo, '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
            $result = json_decode($result);
            $coordenadas = $result->results[0]->geometry->location;
            Detail::create([
                'service_type' => 'Insumo',
                'Property_name' => $request->nombre_insumo,
                'price' => $request->valor_insumo,
                'location' => $request->nombre_insumo,
                'lat' => $coordenadas->lat,
                'lng' => $coordenadas->lng,
                'description' => $request->descripcion_insumo,
                'quotation_id' => $quotation->id,
            ]);
        }

        return redirect()->route('supplier.cotizaciones.index', $event);
    }


    public function show($id)
    {
        //
    }


    public function edit(quotation $quotation)
    {
        $event =   Event::all();
        $companies = Company_datum::all();
        return view('supplier.edit', compact('event', 'companies'));
    }

    /* //Actualizar en BD
    public function update(Request $request, quotation $quotation)
    {
        $quotation->update($request->all());
        return redirect()->route('')->with('info', 'La cotización fue  actualizada con éxito');
    }

    public function destroy(quotation $quotation)
    {
        $quotation->delete();
        return redirect()->route('')->with('info', 'La cotización fue eliminada con éxito');
    } */
}
