<div class="p-3">
    <div class="input-group">
        <select class="form-select" style="max-width: 120px" wire:model="campo" wire:change="clear">
            <option value="name">Nombre</option>
            <option value="city">Ciudad</option>
            <option value="sport">Deporte</option>
        </select>
        {{--  <input type="text" class="form-control" wire:model="texto" wire:input="buscar">  --}}
        <input type="search" id="form1" class="form-control" wire:model="texto" wire:input="buscar" />
        <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
    <table class="table table-bordered table-striped"><br>
        <thead class="table-dark">
            <tr style="text-align: center">
                <th class="border border-warning" scope="col">Nombre</th>
                <th class="border border-warning" scope="col">Ciudad del evento</th>
                <th class="border border-warning" scope="col">Fecha</th>
                <th class="border border-warning" scope="col">Deporte</th>
                <th class="border border-warning" scope="col">Tipo de Proveedor</th>
                <th class="border border-warning" scope="col" colspan="2">Opciones</th>
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
                        @if ($event->quotations->where('status', 'Pagado')->count() == 0)
                            <a href="{{ route('evento.cotizacion', $event) }}"><img
                                    src="{{ asset('img/icono-ver.png') }}" style="width:50px;height:50px;"
                                    title="Ver Detalle"> </a>
                        @endif

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
