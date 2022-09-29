@extends('adminlte::page')

@section('title', 'Editar Cotización')

@section('content_header')
    <a class="btn btn-link" href=""><u>Volver</u></a>
    <h1 class="text-center">Editar Cotización</h1>

    <div class="container-fluid">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <h4><strong>Datos del evento</strong></h4>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nombre del evento</th>
                            <th scope="col">Dirección del evento</th>
                            <th scope="col">Ciudad de evento</th>
                            <th scope="col">Ciudad de origen</th>
                            <th scope="col"># de adultos</th>
                            <th scope="col"># de niños</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->address }}</td>
                            <td>{{ $event->city_to->name }}</td>
                            <td>{{ $event->city_from->name }}</td>
                            <td>{{ $event->adult_passengers }}</td>
                            <td>{{ $event->child_passengers }}</td>
                        </tr>
                    </tbody>
                </table>

                <h4><strong>Datos del organizador</strong></h4>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Compañía</th>
                            <th scope="col">Representante legal</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Ciudad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $event->company->bussiness_name }}</td>
                            <td>{{ $event->company->legal_representative }}</td>
                            <td>{{ $event->company->email }}</td>
                            <td>{{ $event->company->phone }}</td>
                            <td>{{ $event->company->address }}</td>
                            <td>{{ $event->company->city->name }}</td>
                        </tr>
                    </tbody>
                </table>
                <form method="post" action="{{ route('supplier.cotizaciones.update', [$event, $quotation]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <livewire:supplier.form-cotizacion :evento="$event" :cotizacion="$quotation" />
                    <div class="mb-3 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-outline-primary"
                            style="color: black; border-color:#FFAA37;">Finalizar
                            cotización</button>
                    </div>
                </form>
            </div>

        @stop
