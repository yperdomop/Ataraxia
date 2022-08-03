<?php

namespace App\Http\Livewire;

use App\Models\Company_datum;
use Livewire\Component;

class Documentos extends Component
{
    public $idc;
    public function render()
    {
        $datos = Company_datum::all();
        $compania = Company_datum::find($this->idc);
        return view('livewire.documentos', compact('datos', 'compania'));
    }
}
