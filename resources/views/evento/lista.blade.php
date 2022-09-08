<x-app-layout>
    <div class=" w-100">
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
                    <th scope="col" colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr scope="row">
                        <td>{{ $event->name }}</td>
                        {{-- cambie from --}}
                        <td>{{ $event->city_to->name }}</td>
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
                        {{-- <td width="10px">
                            <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0"> <img
                                        src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                        title="Eliminar"></button>
                            </form>
                        </td> --}}

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
