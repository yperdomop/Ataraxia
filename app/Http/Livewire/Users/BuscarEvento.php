<?php

namespace App\Http\Livewire\Users;

use App\Models\City;
use App\Models\Event;
use App\Models\Sport;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuscarEvento extends Component
{
    public $texto = "";
    public $campo = "name";
    public $events;
    public $prueba = 0;

    public function mount()
    {
        $this->buscar();
    }

    public function render()
    {
        return view('livewire.users.buscar-evento');
    }

    public function clear()
    {
        $this->texto = "";
        $this->buscar();
    }

    public function buscar()
    {
        if ($this->campo == 'name') {
            //buscar evento
            $this->events = Event::where('company_datum_id', Auth::user()->company_datum_id)
                ->where('name', 'like', '%' . $this->texto . "%")
                ->orderByDesc('date')
                ->get();
        } elseif ($this->campo == 'city') {
            //buscar ciudad
            $ciudad = City::where('name', 'like', '%' . $this->texto . "%")
                ->pluck('id');
            //buscar evento
            $this->events = Event::where('company_datum_id', Auth::user()->company_datum_id)
                ->whereIn('city_to_id', $ciudad)
                ->orderByDesc('date')
                ->get();
        } elseif ($this->campo == 'sport') {
            $deporte = Sport::where('name', 'like', '%' . $this->texto . "%")
                ->pluck('id');
            //buscar evento
            $this->events = Event::where('company_datum_id', Auth::user()->company_datum_id)
                ->whereIn('sport_id', $deporte)
                ->orderByDesc('date')
                ->get();
            $this->prueba = $deporte;
        }
    }
}
