@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <h4>
            <strong>
                <center>Listado de cotizaciones</center>
            </strong>
        </h4>
    </div>
    <table class="table table-bordered table-striped"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Costo</th>
                <th scope="col">Fecha</th>
                <th scope="col">PDF adjunto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($event->quotations as $cotizacion)
                <tr scope="row">
                    <td>{{ $cotizacion->id }}</td>
                    <td>${{ $cotizacion->price }}</td>
                    <td>{{ $cotizacion->date }}</td>
                    <td>
                        @if ($cotizacion->route)
                            <a href="{{ Storage::url($cotizacion->route) }}" target="_blank">Ver archivo</a>
                        @else
                            Sin documento
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-evenly">
        <a class="btn btn-outline-primary" href=" {{ route('supplier.cotizaciones.create', $event) }}"
            style="color: black; border-color:#FFAA37;">Agregar Cotización</a>
    </div>

@stop
