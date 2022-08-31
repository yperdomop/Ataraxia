<x-app-layout>
    <div class=" w-100 vh-100">
        <div class="container-fluid">
            <h4>
                <strong>
                    <center>Listado de eventos</center>
                </strong>
            </h4>
        </div>
        <table class="table table-bordered table-striped"><br>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ciudad del evento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Deporte</th>
                    <th scope="col">Tipo de Proveedor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr scope="row">
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->city_from->name }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->sport->name }}</td>
                        <td>
                            <ul>
                                @foreach ($event->providerTypes as $provider)
                                    <li>{{ $provider->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td width="10px">
                            <a href="{{ route('evento.cotizacion', $event) }}"><img
                                    src="{{ asset('img/icono-ver.png') }}" style="width:50px;height:50px;"
                                    title="Ver Detalle"> </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-outline-primary" href=" {{ route('evento.seleccion') }}"
                style="color: black; border-color:#FFAA37;">Crear un evento</a>
        </div>
    </div>


</x-app-layout>
