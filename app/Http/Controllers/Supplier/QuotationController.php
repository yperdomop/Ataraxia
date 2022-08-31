<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Event;
use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            Detail::create([
                'service_type' => 'Hotel',
                'Property_name' => $request->nombre_hotel,
                'price' => $request->valor_hotel,
                'location' => $request->ubicacion_hotel,
                'description' => $request->descripcion_hotel,
                'quotation_id' => $quotation->id,
            ]);
        }

        if ($request->nombre_restaurante) {
            Detail::create([
                'service_type' => 'Restaurante',
                'Property_name' => $request->nombre_restaurante,
                'price' => $request->valor_restaurante,
                'location' => $request->ubicacion_restaurante,
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
            Detail::create([
                'service_type' => 'Logistica',
                'Property_name' => $request->nombre_logistica,
                'price' => $request->valor_logistica,
                'location' => $request->ubicacion_logistica,
                'description' => $request->descripcion_logistica,
                'quotation_id' => $quotation->id,
            ]);
        }

        if ($request->nombre_insumo) {
            Detail::create([
                'service_type' => 'Insumo',
                'Property_name' => $request->nombre_insumo,
                'price' => $request->valor_insumo,
                'location' => $request->ubicacion_insumo,
                'description' => $request->descripcion_insumo,
                'quotation_id' => $quotation->id,
            ]);
        }

        return redirect()->route('supplier.cotizaciones.index', $event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
