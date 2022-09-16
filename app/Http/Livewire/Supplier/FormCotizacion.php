<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

class FormCotizacion extends Component
{
    public $hoteles = 1;
    public $restaurantes = 1;
    public $transportes = 1;
    public $logisticas = 1;
    public $insumos = 1;
    //arreglo tipo transporte
    public $transport_types = [
        'Ciudad-ciudad' => 'Ciudad-ciudad',
        'Terminal-Hotel-Terminal' => 'Terminal-Hotel-Terminal',
        'Hotel-Evento-Hotel' => 'Hotel-Evento-Hotel',
        'Otro' => 'Otro',
    ];

    public function render()
    {
        return view('livewire.supplier.form-cotizacion');
    }

    public function addHotel()
    {
        $this->hoteles += 1;
    }

    public function addRestaurante()
    {
        $this->restaurantes += 1;
    }

    public function addTransporte()
    {
        $this->transportes += 1;
    }

    public function addLogistica()
    {
        $this->logisticas += 1;
    }

    public function addInsumo()
    {
        $this->insumos += 1;
    }
}
