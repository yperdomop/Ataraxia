@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <h4><strong>Datos del evento</strong></h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr style="text-align: center">
                    <th class="border border-warning" scope="col">Fecha inicio</th>
                    <th class="border border-warning" scope="col">Fecha fin</th>
                    <th class="border border-warning" scope="col">Nombre del evento</th>
                    <th class="border border-warning" scope="col">Dirección del evento</th>
                    <th class="border border-warning" scope="col">Ciudad de evento</th>
                    <th class="border border-warning" scope="col">Ciudad de origen</th>
                    <th class="border border-warning" scope="col"># de adultos</th>
                    <th class="border border-warning" scope="col"># de niños</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center">
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->address }}</td>
                    <td>{{ $event->city_to->name }}</td>
                    <td>
                        @if ($event->city_from)
                            {{ $event->city_from->name }}
                        @endif
                    </td>
                    <td>{{ $event->adult_passengers }}</td>
                    <td>{{ $event->child_passengers }}</td>
                </tr>
            </tbody>
        </table>
        <h4><strong>Observaciones</strong></h4>
        <table class="table table-striped table-bordered">
            <tr>
                <td>{{ $event->observation }}</td>
            </tr>
        </table>

        <h4><strong>Datos del cotizante</strong></h4>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr style="text-align: center">
                    <th class="border border-warning" scope="col">Compañía</th>
                    <th class="border border-warning" scope="col">Representante legal</th>
                    <th class="border border-warning" scope="col">Correo</th>
                    <th class="border border-warning" scope="col">Teléfono</th>
                    <th class="border border-warning" scope="col">Dirección</th>
                    <th class="border border-warning" scope="col">Ciudad</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center">
                    <td>{{ $event->company->bussiness_name }}</td>
                    <td>{{ $event->company->legal_representative }}</td>
                    <td>{{ $event->company->email }}</td>
                    <td>{{ $event->company->phone }}</td>
                    <td>{{ $event->company->address }}</td>
                    <td>{{ $event->company->city->name }}</td>
                </tr>
            </tbody>
        </table>
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
