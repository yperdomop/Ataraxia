<x-app-layout>

    <h5 class="bg-secondary p-2 text-white "> Gestión de Eventos <br>Organizar un evento</h5>

    <div class="row">
        <div class="col-8">
            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Para comenzar compártanos la siguiente información</center>
                    </strong>
                </h4>
            </div>
            <form method="post" action="{{ route('evento.guardarOrganizar') }}">
                @csrf
                <p>Los campos con * son obligatorios</p>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        placeholder="* Nombre del evento" value="">
                    <label for="nombre">* Nombre del evento</label>
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pt-3 row">
                    <div class="form-group col form-floating mb-3">
                        <select name="ciudad" class="form-control" id="ciudad" placeholder="* Ciudad del Evento"
                            value="">
                            @foreach ($ciudades as $ciudad)
                                <option value={{ $ciudad->id }} @if (Auth::user()->company->city_id == $ciudad->id) selected @endif>
                                    {{ $ciudad->name }}</option>
                            @endforeach
                        </select>
                        <label for="ciudad">* Ciudad del evento</label>
                        @error('ciudad')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col form-floating mb-3">
                        <input type="date" name="fecha" id="fecha" class="form-control"
                            placeholder="* fecha del Evento" value="">
                        <label for="fecha">* fecha del evento</label>
                        @error('fecha')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="pt-3 d-flex row align-items-center">

                    <div class="form-group col form-floating mb-3">
                        <select type="text" name="deporte" id="deporte" class="form-control"
                            placeholder="*Deporte:" value="">
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
                    <div class="form-group col">
                        <select name="proveedor[]" class="form-select select2" aria-label="Default select example"
                            multiple>
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
        </div>
        <div class="col-4">
            <div class="d-flex justify-content-evenly">
                <div>
                    <div class="px-4 py-2 text-white"
                        style="width:300px;height:160px;background-size: 300px 160px;background-image:url({{ asset('img/globo-asistente.png') }})">
                        <p>
                            <center>A medida que
                                el
                                usuario va avanzando en los campos el avatar arroja la ayuda con la orientación de
                                información
                                que debe diligenciar.</center>
                        </p>
                    </div>
                    <img src="{{ asset('img/asistente-12.png') }}" style="width:300px;height:300px;">

                </div>
            </div>
        </div>

    </div>

    </div>

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endpush

</x-app-layout>
