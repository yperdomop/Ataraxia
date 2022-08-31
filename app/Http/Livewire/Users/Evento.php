<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Company_datum;
use App\Models\Provider_type;
use App\Models\city;
use App\Models\Event;
use App\Models\Sport;

class Evento extends Component
{
    public $eventChoose = "";
    public $event1;
    public function render()
    {
        $deportes = sport::all();
        $ciudades = city::all();
        $proveedores = Provider_type::all();

        return view('livewire.users.evento', compact('proveedores', 'ciudades', 'deportes'));
    }

    public function getEvent()
    {
        $this->event1 = Event::where('name', $this->eventChoose)->first();
    }
}
