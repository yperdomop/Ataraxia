@extends('adminlte::page')

@section('content')
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre Compañia</th>
                <th scope="col">Ciudad Origen</th>
                <th scope="col">Fecha del evento</th>
                <th scope="col">Tipo de proveedores solicitados</th>
                <th scope="col"># de adultos</th>
                <th scope="col"># de niños</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr scope="row">
                    <td>
                        {{ $event->company->bussiness_name }}
                    </td>
                    <td>
                        {{ $event->city_from->name }}
                    </td>
                    <td>
                        {{ $event->date }}
                    </td>
                    <td>
                        <ul>
                            @foreach ($event->providerTypes as $provider)
                                <li>{{ $provider->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $event->adult_passengers }}
                    </td>
                    <td>
                        {{ $event->child_passengers }}
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-outline-primary" href="{{ route('supplier.cotizaciones.index', $event) }}"
                                style="color: black; border-color:#FFAA37;">cotizar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
