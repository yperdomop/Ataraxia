<?php

namespace App\Http\Livewire\Users;

use App\Models\Detail;
use Livewire\Component;

class Cotizaciones extends Component
{
    public $evento;
    public $check = [];

    public function render()
    {
        return view('livewire.users.cotizaciones');
    }

    public function updatedCheck()
    {
        $detalles = Detail::whereIn('quotation_id', $this->check)
            ->select('id', 'service_type', 'Property_name', 'location', 'lat', 'lng', 'quotation_id')
            ->where('service_type', '<>', 'Transporte')
            ->get();
        $this->emit('ubicaciones', $detalles);
    }
}
