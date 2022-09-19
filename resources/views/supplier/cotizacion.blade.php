@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('supplier.cotizaciones.store', $event) }}" enctype="multipart/form-data">
            @csrf

            <livewire:supplier.form-cotizacion :evento="$event" />
            <div class="mb-3 d-flex flex-row-reverse">
                <button type="submit" class="btn btn-outline-primary" style="color: black; border-color:#FFAA37;">Finalizar
                    cotización</button>
            </div>
        </form>
    </div>
@stop

@section('js')

@stop
