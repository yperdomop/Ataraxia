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
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($event->quotations->sortBy([['date', 'desc']]) as $cotizacion)
                <tr scope="row">
                    <td>{{ $cotizacion->id }}</td>
                    <td>{{ '$' . number_format($cotizacion->price, 0, ',', '.') }}</td>
                    <td>{{ $cotizacion->date }}</td>
                    <td>
                        @if ($cotizacion->route)
                            <a href="{{ Storage::url($cotizacion->route) }}" target="_blank">Ver archivo</a>
                        @else
                            Sin documento
                        @endif
                    </td>
                    <td width="10px">
                        <a href="{{ route('supplier.cotizaciones.edit', [$event, $cotizacion]) }}"
                            style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary" title="Editar"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('supplier.cotizaciones.destroy', [$event, $cotizacion]) }}" method="post"
                            onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>

                        </form>
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
