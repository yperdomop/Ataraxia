<div>
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
                        <th></th>
                        <th scope="col">Cotización No</th>
                        <th scope="col">Nombre Proveedor</th>
                        <th scope="col">Fecha Cotización</th>
                        <th scope="col">Costo Total</th>
                        <th scope="col" colspan="3"<th>Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($evento->quotations as $cotizacion)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" style="width:20px; height:20px;" type="checkbox"
                                        value="{{ $cotizacion->id }}" id="check{{ $cotizacion->id }}"
                                        wire:model="check">
                                </div>

                            </td>
                            <td><label class="form-check-label w-100"
                                    for="check{{ $cotizacion->id }}">{{ $cotizacion->id }}</label></td>
                            <td><label class="form-check-label w-100"
                                    for="check{{ $cotizacion->id }}">{{ $cotizacion->company->bussiness_name }}</label>
                            </td>
                            <td><label class="form-check-label w-100"
                                    for="check{{ $cotizacion->id }}">{{ $cotizacion->date }}</label></td>
                            <td><label class="form-check-label w-100"
                                    for="check{{ $cotizacion->id }}">{{ '$' . number_format($cotizacion->price, 0, ',', '.') }}</label>
                            </td>
                            <td width="10px">
                                <a href="{{ Route('evento.pdf', $cotizacion) }}" target="_blank"><img
                                        src="{{ asset('img/icono-ver.png') }}" style="width:50px;height:50px;"
                                        title="Ver Detalle"> </a>
                            </td>
                            <td width="10px">
                                @if ($cotizacion->route)
                                    <a href="{{ Storage::url($cotizacion->route) }}" target="_blank"><img
                                            src="{{ asset('img/icono-pdf.png') }}" style="width:40px;height:40px;"
                                            title="Ver PDF"></a>
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
                <div wire:ignore id="googleMap" style="width:100%;height:200px;"></div>

                <center>Modificar información de evento</center>
                <div><br>
                    <h2>¿Que deseas hacer?</h2>
                </div>
                <button class="btn btn-ataraxia m-2" data-bs-toggle="modal" data-bs-target="#comparar"
                    type="button">Comparar
                    cotizaciones</button>
                <a class="btn btn-ataraxia m-2" href="{{ route('evento.pago') }}" role="button">Ir a
                    Pagar</a>
                <a class="btn btn-ataraxia m-2" href="" role="button">Solicitar otras Cotizaciones</a>
            </div>
        </div>
        <div class="modal" id="comparar" tabindex="-1">
            <div class="modal-dialog" style="max-width: 100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Comparación de cotizaciones</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-responsive table-bordered"><br>
                            <thead class="table-dark text-center">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <tr>
                                            <th scope="col" class="align-middle" rowspan="2">Proveedor</th>
                                            <th scope="col" colspan="3">Hospedaje</>
                                            <th scope="col" colspan="3">Alimentación</th>
                                            <th scope="col" colspan="3">Transporte</th>
                                            <th scope="col" class="align-middle" rowspan="2">Opciones</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Costo</th>
                                            <th scope="col">Descripción</th>
                                        </tr>
                                    </div>
                                </div>
                            </thead>
                            <tbody>
                                @foreach ($cotizaciones as $cotizacion)
                                    @php
                                        $hotel = $cotizacion->details->where('service_type', 'Hotel');
                                        $restaurante = $cotizacion->details->where('service_type', 'Restaurante');
                                        $transporte = $cotizacion->details->where('service_type', 'Transporte');
                                    @endphp
                                    @for ($i = 0; $i < $cotizacion->details->countBy('service_type')->max(); $i++)
                                        <tr>
                                            @if ($i == 0)
                                                <td class="align-middle"
                                                    rowspan="{{ $cotizacion->details->countBy('service_type')->max() }}">
                                                    {{ $cotizacion->company->bussiness_name }}
                                                </td>
                                            @endif
                                            <td>
                                                @isset($hotel[$i])
                                                    {{ $hotel[$i]->Property_name }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($hotel[$i])
                                                    {{ '$' . number_format($hotel[$i]->price, 0, ',', '.') }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($hotel[$i])
                                                    {{ $hotel[$i]->description }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($restaurante[$i + $hotel->count()])
                                                    {{ $restaurante[$i + $hotel->count()]->Property_name }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($restaurante[$i + $hotel->count()])
                                                    {{ '$' . number_format($restaurante[$i + $hotel->count()]->price, 0, ',', '.') }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($restaurante[$i + $hotel->count()])
                                                    {{ $restaurante[$i + $hotel->count()]->description }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($transporte[$i + $hotel->count() + $restaurante->count()])
                                                    {{ $transporte[$i + $hotel->count() + $restaurante->count()]->Property_name }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($transporte[$i + $hotel->count() + $restaurante->count()])
                                                    {{ '$' . number_format($transporte[$i + $hotel->count() + $restaurante->count()]->price, 0, ',', '.') }}
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($transporte[$i + $hotel->count() + $restaurante->count()])
                                                    {{ $transporte[$i + $hotel->count() + $restaurante->count()]->description }}
                                                @endisset
                                            </td>
                                            @if ($i == 0)
                                                <td class="align-middle"
                                                    rowspan="{{ $cotizacion->details->countBy('service_type')->max() }}">
                                                    @if ($cotizacion->route)
                                                        <a href="{{ Storage::url($cotizacion->route) }}"
                                                            target="_blank"><img
                                                                src="{{ asset('img/icono-pdf.png') }}"
                                                                style="width:40px;height:40px;" title="Ver PDF"></a>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endfor
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-ataraxia" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                let evento = @js($evento);
                const icono = @js(asset('img/pin-evento.png'));

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
                        position: new google.maps.LatLng(evento.lat, evento.lng),
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
                    var markers = [];
                    //recorrer ubicaciones db
                    window.Livewire.on('ubicaciones', (detalles) => {
                        for (a in markers) {
                            markers[a].setMap(null);
                        }
                        markers = [];
                        info = [];
                        for (let i = 0; i < detalles.length; i++) {
                            var iconoUbicacion = icono.replace('evento', detalles[i].service_type);
                            console.log(icono.replace('evento', detalles[i].service_type));
                            markers[i] = new google.maps.Marker({
                                position: new google.maps.LatLng(detalles[i].lat, detalles[i].lng),
                                map: map,
                                icon: iconoUbicacion,
                            });
                            var texto = "<h4>" + detalles[i].Property_name + "</h4>" + "<p>" + detalles[i].location +
                                "</p>" + "<p>" + detalles[i].service_type + "<br>Cotización #" + detalles[i].quotation_id +
                                "</p>";

                            info[i] = new google.maps.InfoWindow({
                                content: texto
                            });

                            markers[i].addListener('click', function() {
                                info[i].open({
                                    map,
                                    anchor: markers[i],
                                });
                            });
                        }
                    });
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=myMap"></script>
        @endpush
    </div>
