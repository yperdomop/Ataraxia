<x-app-layout>

    <h5 class="bg-secondary p-2 text-white"> Gestión de Eventos <br>Asistir a un Evento</h5>
    </div>
    <div class="row m-3">
        <div class="col-8"</i>
            <h2><i class="fas fa-handshake"></i>
                <strong>
                    COTIZACIONES
                </strong>
            </h2>
            <h5>Recibidas</h5>
            <table class="table table-bordered"><br>
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Cotización No</th>
                        <th scope="col">Nombre Proveedor</th>
                        <th scope="col">Fecha Cotización</th>
                        <th scope="col">Costo Total</th>
                        <th scope="col" colspan="3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evento->quotations as $cotizacion)
                        <tr>
                            <td>{{ $cotizacion->id }}</td>
                            <td>{{ $cotizacion->company->bussiness_name }}</td>
                            <td>{{ $cotizacion->date }}</td>
                            <td>{{ '$' . number_format($cotizacion->price, 0, ',', '.') }}</td>
                            <td width="10px">
                                <a href="{{ Route('evento.pdf', $cotizacion) }}" target="_blank"><img
                                        src="{{ asset('img/icono-ver.png') }}" style="width:50px;height:50px;"
                                        title="Ver Detalle"> </a>
                            </td>
                            <td width="10px">
                                @if ($cotizacion->route)
                                    <a href="{{ Storage::url($cotizacion->route) }}"><img
                                            src="{{ asset('img/icono-pdf.png') }}" style="width:40px;height:40px;"
                                            title="Ver PDF" target="_blank"></a>
                                @endif
                            </td>
                            <td width="10px">
                                <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border-0"> <img
                                            src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                            title="Eliminar"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-4">
            <div class="row m-5">
                <h2>
                    <center><strong> Evento </strong></center>
                </h2>
                <div id="googleMap" style="width:100%;height:200px;"></div>

                <center>Modificar información de evento</center>
                <div><br>
                    <h2>¿Que deseas hacer?</h2>
                </div>
                <a class="btn btn-ataraxia m-2" href="{{ route('evento.pago') }}" role="button">Ir a
                    Pagar</a>
                <a class="btn btn-ataraxia m-2" href="" role="button">Solicitar otras Cotizaciones</a>

            </div>

        </div>
    </div>
    <div>
        <a class="btn btn-ataraxia" href="{{ route('evento.gestion') }}">Volver</a>
    </div>

    @foreach ($evento->quotations as $cotizacion)
        @foreach ($cotizacion->details as $detalle)
        @endforeach
    @endforeach

    @push('scripts')
        <script>
            function myMap() {
                var mapProp = {
                    center: new google.maps.LatLng({{ $evento->lat }}, {{ $evento->lng }}),
                    zoom: 13,
                    disableDefaultUI: true,
                    zoomControl: true,
                    fullscreenControl: true,

                };

                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                var texto = "<h4>{{ $evento->name }}</h4>" + "<p>{{ $evento->address }}</p>";
                const marcador = new google.maps.Marker({
                    position: new google.maps.LatLng({{ $evento->lat }}, {{ $evento->lng }}),
                    map: map,
                    icon: "{{ asset('img/pin-evento.png') }}"
                });

                var informacion = new google.maps.InfoWindow({
                    content: texto
                });

                marcador.addListener('click', function() {
                    informacion.open({
                        map,
                        anchor: marcador,
                    });
                });

                @foreach ($evento->quotations as $cotizacion)
                    @foreach ($cotizacion->details as $detalle)
                        @if ($detalle->service_type == 'Transporte')
                            @continue
                        @endif
                        const {{ $detalle->service_type }}{{ $detalle->id }} = new google.maps.Marker({
                            position: new google.maps.LatLng({{ $detalle->lat }}, {{ $detalle->lng }}),
                            map: map,
                            icon: "{{ asset('img/pin-' . $detalle->service_type . '.png') }}"
                        });

                        var {{ Str::slug($detalle->Property_name, '_') }}{{ $cotizacion->id }} = new google.maps.InfoWindow({
                            content: "<h4>{{ $detalle->Property_name }}</h4>" + "<p>{{ $detalle->location }}</p>" +
                                "<p>{{ $detalle->service_type }}</p>",
                        });

                        {{ $detalle->service_type }}{{ $detalle->id }}.addListener('click', function() {
                            {{ Str::slug($detalle->Property_name, '_') }}{{ $cotizacion->id }}.open({
                                map,
                                anchor: {{ $detalle->service_type }}{{ $detalle->id }},
                            });
                        });
                    @endforeach
                @endforeach

            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=myMap"></script>
    @endpush

</x-app-layout>
