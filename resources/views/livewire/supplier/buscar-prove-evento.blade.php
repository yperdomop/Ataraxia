<div class="p-3">
    <div class="input-group">
        <select class="form-select" wire:model="campo" wire:change="clear">
            <option value="company">Nombre de la compañía</option>
            <option value="event">Nombre del evento</option>
            <option value="city">Ciudad de origen</option>
        </select>

        <input type="search" id="form1" class="form-control" wire:model="texto" wire:input="buscar" />
        <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <table class="table table-bordered table-striped"><br>
        <thead class="table-dark">
            <tr style="text-align: center">
                <th class="border border-warning" scope="col">Nombre Compañía</th>
                <th class="border border-warning" scope="col">Tipo de evento</th>
                <th class="border border-warning" scope="col">Nombre del evento</th>
                <th class="border border-warning" scope="col">Ciudad origen</th>
                <th class="border border-warning" scope="col">Fecha del evento</th>
                <th class="border border-warning" scope="col">Tipo proveedores solicitados</th>
                <th class="border border-warning" scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr style="text-align: center" scope="row">
                    <td>
                        {{ $event->company->bussiness_name }}
                    </td>
                    <td> {{ $event->event_type }}</td>
                    <td> {{ $event->name }}</td>
                    <td>
                        @if ($event->city_from)
                            {{ $event->city_from->name }}
                        @endif
                    </td>
                    <td>{{ $event->date }}</td>
                    <td>
                        <ul>
                            @foreach ($event->providerTypes as $provider)
                                <li>{{ $provider->name }}</li>
                            @endforeach
                        </ul>
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
</div>
