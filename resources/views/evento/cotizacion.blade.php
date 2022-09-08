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
                            <td>${{ $cotizacion->price }}</td>
                            <td width="10px">
                                <a href="{{ Route('evento.pdf', $cotizacion) }}" target="_blank"><img
                                        src="{{ asset('img/icono-ver.png') }}" style="width:50px;height:50px;"
                                        title="Ver Detalle"> </a>
                            </td>
                            <td width="10px">
                                @if ($cotizacion->route)
                                    <a href="{{ Storage::url($cotizacion->route) }}" target="_blank"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                            fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                        </svg></a>
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
                        const {{ $detalle->service_type }}{{ $cotizacion->id }} = new google.maps.Marker({
                            position: new google.maps.LatLng({{ $detalle->lat }}, {{ $detalle->lng }}),
                            map: map,
                        });

                        var {{ Str::slug($detalle->Property_name, '_') }}{{ $cotizacion->id }} = new google.maps.InfoWindow({
                            content: "<h4>{{ $detalle->Property_name }}</h4>" + "<p>{{ $detalle->location }}</p>" +
                                "<p>{{ $detalle->service_type }}</p>",
                        });

                        {{ $detalle->service_type }}{{ $cotizacion->id }}.addListener('click', function() {
                            {{ Str::slug($detalle->Property_name, '_') }}{{ $cotizacion->id }}.open({
                                map,
                                anchor: {{ $detalle->service_type }}{{ $cotizacion->id }},
                            });
                        });
                    @endforeach
                @endforeach

            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=myMap"></script>
    @endpush

</x-app-layout>
