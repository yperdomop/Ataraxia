<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Event;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCotizacion extends Component
{
    //variables
    public $hoteles;
    public $restaurantes;
    public $transportes;
    public $logisticas;
    public $insumos;
    public $cotizacion;
    public $total;

    //arreglos para suma
    public $lw_hotel = [];
    public $lw_restaurante = [];
    public $lw_transporte = [];
    public $lw_logistica = [];
    public $lw_insumo = [];

    //consulta de detalles (solo en editar)
    public $bd_hoteles;
    public $bd_restaurantes;
    public $bd_transportes;
    public $bd_logisticas;
    public $bd_insumos;

    //arreglo tipo transporte
    public $transport_types = [
        'Ciudad-ciudad' => 'Ciudad-ciudad',
        'Terminal-Hotel-Terminal' => 'Terminal-Hotel-Terminal',
        'Hotel-Evento-Hotel' => 'Hotel-Evento-Hotel',
        'Otro' => 'Otro',
    ];
    //constructor
    public function mount(Event $evento, Quotation $cotizacion)
    {
        //Hotel Restaurante Transporte Logistica Insumo
        $this->cotizacion = $cotizacion;
        //consulta si cotizacion ya existe
        $this->bd_hoteles = $cotizacion->details->where('service_type', 'Hotel');
        $this->bd_restaurantes = $cotizacion->details->where('service_type', 'Restaurante');
        $this->bd_transportes = $cotizacion->details->where('service_type', 'Transporte');
        $this->bd_logisticas = $cotizacion->details->where('service_type', 'Logistica');
        $this->bd_insumos = $cotizacion->details->where('service_type', 'Insumo');
        //iniciar arreglos
        foreach ($this->bd_hoteles as $hotel) {
            array_push($this->lw_hotel, $hotel->price);
        }
        foreach ($this->bd_restaurantes as $restaurante) {
            array_push($this->lw_restaurante, $restaurante->price);
        }
        foreach ($this->bd_transportes as $transporte) {
            array_push($this->lw_transporte, $transporte->price);
        }
        foreach ($this->bd_logisticas as $logistica) {
            array_push($this->lw_logistica, $logistica->price);
        }
        foreach ($this->bd_insumos as $insumo) {
            array_push($this->lw_insumo, $insumo->price);
        }

        //asignar valores
        if (Auth::user()->company->provider_type_id == 3) {
            $this->hoteles = isset($cotizacion->id) ? $this->bd_hoteles->count() : 1;
            $this->restaurantes = isset($cotizacion->id) ? $this->bd_restaurantes->count() : 1;
            $this->transportes = isset($cotizacion->id) ? $this->bd_transportes->count() : 1;
            $this->logisticas = isset($cotizacion->id) ? $this->bd_logisticas->count() : 1;
            $this->insumos = isset($cotizacion->id) ? $this->bd_insumos->count() : 1;
        }
        if ($evento->providerTypes->where('id', 1)->count() > 0) {
            $this->hoteles = isset($cotizacion->id) ? $this->bd_hoteles->count() : 1;
            $this->transportes = isset($cotizacion->id) ? $this->bd_transportes->count() : 1;
        }
        if ($evento->providerTypes->where('id', 2)->count() > 0) {
            $this->insumos = isset($cotizacion->id) ? $this->bd_insumos->count() : 1;
        }
        if ($evento->providerTypes->where('id', 4)->count() > 0) {
            $this->restaurantes = isset($cotizacion->id) ? $this->bd_restaurantes->count() : 1;
        }
        if ($evento->providerTypes->where('id', 5)->count() > 0) {
            $this->logisticas = isset($cotizacion->id) ? $this->bd_logisticas->count() : 1;
            $this->transportes = isset($cotizacion->id) ? $this->bd_transportes->count() : 1;
        }

        $this->total = isset($cotizacion->price) ? $cotizacion->price : 0;
    }

    public function render()
    {
        return view('livewire.supplier.form-cotizacion');
    }

    public function addHotel()
    {
        $this->hoteles += 1;
        $this->lw_hotel[$this->hoteles - 1] = 0;
    }

    public function addRestaurante()
    {
        $this->restaurantes += 1;
        $this->lw_restaurante[$this->restaurantes - 1] = 0;
    }

    public function addTransporte()
    {
        $this->transportes += 1;
        $this->lw_transporte[$this->transportes - 1] = 0;
    }

    public function addLogistica()
    {
        $this->logisticas += 1;
        $this->lw_logistica[$this->logisticas - 1] = 0;
    }

    public function addInsumo()
    {
        $this->insumos += 1;
        $this->lw_insumo[$this->insumos - 1] = 0;
    }

    public function sumar()
    {
        $this->total = array_sum($this->lw_hotel) + array_sum($this->lw_restaurante) + array_sum($this->lw_transporte) + array_sum($this->lw_logistica) + array_sum($this->lw_insumo);
    }
}
