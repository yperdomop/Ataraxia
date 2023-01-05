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
        $file = '';

        if ($request->file('file')) {
            $file = Storage::put('cotizaciones', $request->file('file'));
        }
        //crear cotizacion
        $quotation = Quotation::create([
            'price' => $request->f_total,
            'date' => Carbon::now(),
            'route' => $file,
            'status' => 'pendiente',
            'company_datum_id' => Auth::user()->company_datum_id,
            'location' => Auth::user()->company->address,
            'event_id' => $event->id,
        ]);

        //detalle hoteles
        for ($i = 0; $i < $request->hotels; $i++) {
            if ($request->input('nombre_hotel_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_hotel_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Hotel',
                    'Property_name' => $request->input('nombre_hotel_' . $i),
                    'price' => $request->input('valor_hotel_' . $i),
                    'location' => $request->input('ubicacion_hotel_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_hotel_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }
        //detalles restaurante
        for ($i = 0; $i < $request->restaurants; $i++) {
            if ($request->input('nombre_restaurante_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_restaurante_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Restaurante',
                    'Property_name' => $request->input('nombre_restaurante_' . $i),
                    'price' => $request->input('valor_restaurante_' . $i),
                    'location' => $request->input('ubicacion_restaurante_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_restaurante_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }
        //detalles transporte
        for ($i = 0; $i < $request->transports; $i++) {
            if ($request->input('nombre_transporte_' . $i)) {
                Detail::create([
                    'service_type' => 'Transporte',
                    'Property_name' => $request->input('nombre_transporte_' . $i),
                    'price' => $request->input('valor_transporte_' . $i),
                    'description' => $request->input('descripcion_transporte_' . $i),
                    'quotation_id' => $quotation->id,
                    'transport_type' => $request->input('tipo_transporte_' . $i),
                ]);
            }
        }
        //detalles logistica
        for ($i = 0; $i < $request->logistics; $i++) {
            if ($request->input('nombre_logistica_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_logistica_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Logistica',
                    'Property_name' => $request->input('nombre_logistica_' . $i),
                    'price' => $request->input('valor_logistica_' . $i),
                    'location' => $request->input('ubicacion_logistica_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_logistica_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }
        //detalles insumo
        for ($i = 0; $i < $request->insumos; $i++) {
            if ($request->input('nombre_insumo_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_insumo_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Insumo',
                    'Property_name' => $request->input('nombre_insumo_' . $i),
                    'price' => $request->input('valor_insumo_' . $i),
                    'location' => $request->input('ubicacion_insumo_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_insumo_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }

        return redirect()->route('supplier.cotizaciones.index', $event);
    }

    public function edit(Event $event, quotation $quotation)
    {

        return view('supplier.edit', compact('event', 'quotation'));
    }

    //Actualizar en BD
    public function update(Request $request, Event $event, quotation $quotation)
    {
        $quotation->update(['price' => $request->f_total]);

        if ($request->file('file')) {
            Storage::delete($quotation->route);
            $file = Storage::put('cotizaciones', $request->file('file'));
            $quotation->update(['route' => $file]);
        }

        Detail::where('quotation_id', $quotation->id)->delete();

        //detalle hoteles
        for ($i = 0; $i < $request->hotels; $i++) {
            if ($request->input('nombre_hotel_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_hotel_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Hotel',
                    'Property_name' => $request->input('nombre_hotel_' . $i),
                    'price' => $request->input('valor_hotel_' . $i),
                    'location' => $request->input('ubicacion_hotel_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_hotel_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }
        //detalles restaurante
        for ($i = 0; $i < $request->restaurants; $i++) {
            if ($request->input('nombre_restaurante_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_restaurante_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Restaurante',
                    'Property_name' => $request->input('nombre_restaurante_' . $i),
                    'price' => $request->input('valor_restaurante_' . $i),
                    'location' => $request->input('ubicacion_restaurante_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_restaurante_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }
        //detalles transporte
        for ($i = 0; $i < $request->transports; $i++) {
            if ($request->input('nombre_transporte_' . $i)) {
                Detail::create([
                    'service_type' => 'Transporte',
                    'Property_name' => $request->input('nombre_transporte_' . $i),
                    'price' => $request->input('valor_transporte_' . $i),
                    'description' => $request->input('descripcion_transporte_' . $i),
                    'quotation_id' => $quotation->id,
                    'transport_type' => $request->input('tipo_transporte_' . $i),
                ]);
            }
        }
        //detalles logistica
        for ($i = 0; $i < $request->logistics; $i++) {
            if ($request->input('nombre_logistica_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_logistica_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Logistica',
                    'Property_name' => $request->input('nombre_logistica_' . $i),
                    'price' => $request->input('valor_logistica_' . $i),
                    'location' => $request->input('ubicacion_logistica_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_logistica_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }
        //detalles insumo
        for ($i = 0; $i < $request->insumos; $i++) {
            if ($request->input('nombre_insumo_' . $i)) {
                $result = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address=' . Str::slug($request->input('ubicacion_insumo_' . $i), '+') . ',' . Str::slug($event->city_to->name, '+') . ',' . Str::slug($event->city_to->department->country->name, '+') . '&key=' . env('GOOGLE_API_KEY'));
                $result = json_decode($result);
                $coordenadas = $result->results[0]->geometry->location;
                Detail::create([
                    'service_type' => 'Insumo',
                    'Property_name' => $request->input('nombre_insumo_' . $i),
                    'price' => $request->input('valor_insumo_' . $i),
                    'location' => $request->input('ubicacion_insumo_' . $i),
                    'lat' => $coordenadas->lat,
                    'lng' => $coordenadas->lng,
                    'description' => $request->input('descripcion_insumo_' . $i),
                    'quotation_id' => $quotation->id,
                ]);
            }
        }

        return redirect()->route('supplier.cotizaciones.index', $event);
    }


    public function destroy(Event $event, quotation $quotation)
    {
        Storage::delete($quotation->route);
        Detail::where('quotation_id', $quotation->id)->delete();
        $quotation->delete();
        return redirect()->route('supplier.cotizaciones.index', $event);
    }
}
