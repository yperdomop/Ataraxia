<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Event;
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
    public $total = 0;
    //arreglos para suma
    public $lw_hotel = [0];
    public $lw_restaurante = [0];
    public $lw_transporte = [0];
    public $lw_logistica = [0];
    public $lw_insumo = [0];

    //arreglo tipo transporte
    public $transport_types = [
        'Ciudad-ciudad' => 'Ciudad-ciudad',
        'Terminal-Hotel-Terminal' => 'Terminal-Hotel-Terminal',
        'Hotel-Evento-Hotel' => 'Hotel-Evento-Hotel',
        'Otro' => 'Otro',
    ];

    public function mount(Event $evento)
    {
        if (Auth::user()->company->provider_type_id == 3) {
            $this->hoteles = 1;
            $this->restaurantes = 1;
            $this->transportes = 1;
            $this->logisticas = 1;
            $this->insumos = 1;
        }
        if ($evento->providerTypes->where('id', 1)->count() > 0) {
            $this->hoteles = 1;
            $this->transportes = 1;
        }
        if ($evento->providerTypes->where('id', 2)->count() > 0) {
            $this->insumos = 1;
        }
        if ($evento->providerTypes->where('id', 4)->count() > 0) {
            $this->restaurantes = 1;
        }
        if ($evento->providerTypes->where('id', 5)->count() > 0) {
            $this->logisticas = 1;
            $this->transportes = 1;
        }
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
