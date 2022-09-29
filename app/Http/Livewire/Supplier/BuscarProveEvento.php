<?php

namespace App\Http\Livewire\Supplier;

use App\Models\City;
use App\Models\Event;
use App\Models\Company_datum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class BuscarProveEvento extends Component
{
    public $texto;
    public $campo = 'company';
    public $events;

    public function mount()
    {
        $this->buscar();
    }

    public function render()
    {
        return view('livewire.supplier.buscar-prove-evento');
    }

    public function clear()
    {
        $this->texto = "";
        $this->buscar();
    }

    public function buscar()
    {
        if ($this->campo == 'company') {
            //buscar company
            $compania = Company_datum::where('bussiness_name', 'like', '%' . $this->texto . "%")
                ->pluck('id');
            //buscar evento
            $this->events = Event::whereHas('providerTypes', function (Builder $query) {
                return $query->where('provider_type_id', Auth::user()->company->provider_type_id);
            })->where('city_to_id', Auth::user()->company->city_id)
                ->whereIn('company_datum_id', $compania)
                ->orderByDesc('date')
                ->get();
        } elseif ($this->campo == 'event') {
            //buscar evento
            $this->events = Event::whereHas('providerTypes', function (Builder $query) {
                return $query->where('provider_type_id', Auth::user()->company->provider_type_id);
            })->where('city_to_id', Auth::user()->company->city_id)
                ->where('name', 'like', '%' . $this->texto . "%")
                ->orderByDesc('date')
                ->get();
        } elseif ($this->campo == 'city') {
            //buscar ciudad
            $ciudad = City::where('name', 'like', '%' . $this->texto . "%")
                ->pluck('id');
            //buscar evento
            $this->events = Event::whereHas('providerTypes', function (Builder $query) {
                return $query->where('provider_type_id', Auth::user()->company->provider_type_id);
            })->where('city_to_id', Auth::user()->company->city_id)
                ->whereIn('city_from_id', $ciudad)
                ->orderByDesc('date')
                ->get();
        }
    }
}
