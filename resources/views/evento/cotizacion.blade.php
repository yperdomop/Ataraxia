<x-app-layout>

    <h5 class="bg-secondary p-2 text-white"> Gestión de Eventos <br>Asistir a un Evento</h5>
    <livewire:users.cotizaciones :evento="$evento">
        <div>
            <a class="btn btn-ataraxia" href="{{ route('evento.gestion') }}">Volver</a>
        </div>

        {{--  @push('scripts')
            <script>
                let evento = @js($evento);
                let icono = @js(asset('img/pin-evento.png'));

                function myMap() {
                    var mapProp = {
                        center: new google.maps.LatLng(evento.lat, evento.lng),
                        zoom: 13,
                        disableDefaultUI: true,
                        zoomControl: true,
                        fullscreenControl: true,

                    };

                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                    var texto = "<h4>" + evento.name + "</h4>" + "<p>" + evento.address + "</p>";
                    const marcador = new google.maps.Marker({
                        position: new google.maps.LatLng({{ $evento->lat }}, {{ $evento->lng }}),
                        map: map,
                        icon: icono,
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
        @endpush  --}}

</x-app-layout>
