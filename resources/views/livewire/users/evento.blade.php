<form method="post" action="{{ route('evento.guardar') }}">
    @csrf
    <p>Los campos con * son obligatorios</p>
    <div class="form-floating mb-3">
        <input list="events" class="form-control" name="nombre" id="nombre" placeholder="* Nombre del evento"
            wire:model.lazy="eventChoose" wire:focusout="getEvent">
        <label for="nombre">* Nombre del evento</label>
        <datalist id="events">
            @foreach (Auth::user()->company->events as $event)
                <option value="{{ $event->name }}"></option>
            @endforeach
        </datalist>
        @error('nombre')
            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
        @enderror
    </div>

    <div class="pt-3 row">
        <div class="form-group col form-floating mb-3">
            <select name="ciudad" class="form-control" id="ciudad" placeholder="* Ciudad del Evento" value="">
                @foreach ($ciudades as $ciudad)
                    <option value={{ $ciudad->id }}>
                        {{ $ciudad->name }}</option>
                @endforeach
            </select>
            <label for="ciudad">* Ciudad del evento</label>
            @error('ciudad')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col form-floating mb-3">
            <input type="date" name="fecha" id="fecha" class="form-control" placeholder="* fecha del Evento"
                value="">
            <label for="fecha">* fecha del evento</label>
            @error('fecha')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col form-floating mb-3">
            <select type="text" name="origen" id="origen" class="form-control" placeholder="* Ciudad de Origen:"
                value="">
                @foreach ($ciudades as $ciudad)
                    <option value={{ $ciudad->id }} @if (Auth::user()->company->city_id == $ciudad->id) selected @endif>
                        {{ $ciudad->name }}</option>
                @endforeach
            </select>
            <label for="origen">* Ciudad de origen</label>
            @error('origen')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="pt-3 d-flex row align-items-center">
        <div class="form-group col">
            <div class=" form-floating">
                <input type="number" name="adultos" id="adultos" class="form-control" placeholder="Pasajeros:Adultos"
                    value="">
                <label for="adultos"> Pasajeros:Adultos</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="ninos" id="ninos" class="form-control" placeholder="Pasajeros:Adultos"
                    value="">
                <label for="ninos"> Pasajeros:Niños</label>
            </div>
        </div>

        <div class="form-group col form-floating mb-3">
            <select type="text" name="deporte" id="deporte" class="form-control" placeholder="*Deporte:"
                value="">
                @foreach ($deportes as $deporte)
                    <option value="{{ $deporte->id }}" @if (Auth::user()->company->sport_id == $deporte->id) selected @endif>
                        {{ $deporte->name }}</option>
                @endforeach
            </select>
            <label for="deporte"> *Deporte</label>
            @error('deporte')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col form-floating mb-3">
            <input type="text" name="escenario" id="escenario" class="form-control"
                placeholder="*Escenario Deportivo:" value="">
            <label for="escenario"> *Escenario deportivo</label>
            @error('escenario')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="pt-3 row">
        <div class="form-group col form-floating mb-3">
            <input type="text" name="transporte" id="transporte" class="form-control"
                placeholder="* Medio de Transporte" value="">
            <label for="transporte"> * Medio de Transporte</label>
            @error('transporte')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col form-floating mb-3">
            <input type="text" name="traslados" id="traslados" class="form-control"
                placeholder="Traslados:"value="">
            <label for="traslados"> Traslados</label>
        </div>
        <div wire:ignore class="form-group col">
            <select name="proveedor" class="form-select select2" aria-label="Default select example" multiple>
                <option value="" selected>proveedor para tu evento</option>
                @foreach ($proveedores as $proveedor)
                    <option value={{ $proveedor->id }}>{{ $proveedor->name }}</option>
                @endforeach
            </select>
            @error('proveedor')
                <div class="text-danger" style="font-size:12px">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="observacion" rows="3"
            placeholder="Observaciones"></textarea>
    </div><br>
    <div class="d-flex justify-content-between">
        <a class="btn btn-ataraxia" href="{{ route('evento.seleccion') }}">Volver</a>
        <input type="submit" class="btn btn-ataraxia" value="Solicitar cotización" />

    </div>

</form>
