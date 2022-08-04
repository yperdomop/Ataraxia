<x-app-layout>

    <h5 class="bg-secondary p-2 text-white "> Gestión de Eventos <br>Asistir a un Evento</h5>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Para comenzar compártanos la siguiente información</center>
                    </strong>
                </h4>
            </div>
            <form method="post" action="{{ route('evento.guardar') }}">
                @csrf
                <input type="text" class="form-control" placeholder="Nombre del Evento">

                <div class="pt-3 row">
                    <div class="form-group col">
                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad del Evento">
                    </div>
                    <div class="form-group col">
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group col">
                        <input type="text" class="form-control" placeholder="Ciudad de Origen:">
                    </div>
                </div>

                <div class="pt-3 d-flex row align-items-center">
                    <div class="form-group col">
                        <input type="number" class="form-control" placeholder="Pasajeros:Adultos">
                        <input type="number" class="form-control" placeholder="Pasajeros:Menores de Edad">

                    </div>

                    <div class="form-group col">
                        <input type="text" class="form-control" placeholder="Deporte:">
                    </div>
                    <div class="form-group col">
                        <input type="text" name="escenario" class="form-control" placeholder="Escenario Deportivo:">
                    </div>
                </div>

                <div class="pt-3 row">
                    <div class="form-group col">
                        <input type="test" class="form-control" placeholder="Medio de Transporte:">
                    </div>
                    <div class="form-group col">
                        <input type="text" class="form-control" placeholder="Translados:">
                    </div>
                    <div class="form-group col">
                        <select name="proveedor[]" class="form-select select2" aria-label="Default select example"
                            multiple>
                            <option value="" selected>proveedor para tu evento</option>
                            @foreach ($proveedores as $proveedor)
                                <option value={{ $proveedor->id }}>{{ $proveedor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Observaciones:</textarea>
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
