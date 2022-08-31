@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="pt-3 row">
            <h4>
                <strong>
                    <center>HOSPEDAJE</center>
                </strong>
            </h4>
        </div>
        <form method="post" action="{{ route('supplier.cotizaciones.store', $event) }}" enctype="multipart/form-data">
            @csrf
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre_hotel">Nombre del hotel</label>
                    <input type="text" name="nombre_hotel" id="" class="form-control"
                        placeholder="Nombre del hotel" value="">
                    @error('nombre_hotel')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor_hotel">Costo del hotel</label>
                    <input type="number" name="valor_hotel" id="valor_hotel" class="form-control"
                        placeholder="Costo del hotel" value="">
                    @error('valor_hotel')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="ubicacion_hotel">Ubicación del hotel</label>
                    <input type="text" name="ubicacion_hotel" id="ubicacion_hotel" class="form-control"
                        placeholder="Ubicación del hotel" value="">
                    @error('ubicacion_hotel')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="descripcion_hotel">Descripción</label>
                    <textarea class="form-control" name="descripcion_hotel" placeholder="Leave a comment here" id="descripcion_hotel"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>
            </div>

            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Alimentación</center>
                    </strong>
                </h4>
            </div>
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre_restaurante">Nombre del restaurante</label>
                    <input type="text" name="nombre_restaurante" id="nombre_restaurante" class="form-control"
                        placeholder="Nombre del restaurante" value="">
                    @error('nombre_restaurante')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor_restaurante">Costo del restaurante</label>
                    <input type="number" name="valor_restaurante" id="valor_restaurante" class="form-control"
                        placeholder="Costo del restaurante" value="">
                    @error('valor_restaurante')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="ubicacion_restaurante">Ubicación del restaurante</label>
                    <input type="text" name="ubicacion_restaurante" id="ubicacion_restaurante" class="form-control"
                        placeholder="Ubicación del hotel" value="">
                    @error('ubicacion_restaurante')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="descripcion_restaurante">Descripción</label>
                    <textarea class="form-control" name="descripcion_restaurante" placeholder="Leave a comment here"
                        id="descripcion_restaurante"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>
            </div>

            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Transporte</center>
                    </strong>
                </h4>
            </div>
            <div class="pt-3 row">
                <div class="form-group col">
                    <label for="nombre_transporte">Nombre del transporte</label>
                    <select class="form-control form-select-lg" name="tipo_transporte" id="tipo_transporte"
                        aria-label=".form-select-lg example">
                        <option selected>Seleccione el transporte</option>
                        <option>Ciudad-ciudad</option>
                        <option>Terminal-Hotel-Terminal</option>
                        <option>Hotel-Evento-Hotel</option>
                        <option>Otro</option>
                    </select>
                </div>

                <div class="form-group col mb-3">
                    <label for="nombre_transporte">Nombre de la compañía</label>
                    <input type="text" name="nombre_transporte" id="nombre_transporte" class="form-control"
                        placeholder="Nombre de la compañía" value="">
                    @error('nombre_transporte')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor_transporte">Costo del transporte</label>
                    <input type="number" name="valor_transporte" id="valor_transporte" class="form-control"
                        placeholder="Costo del transporte" value="">
                    @error('valor_transporte')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="descripcion_transporte">Descripción</label>
                    <textarea class="form-control" name="descripcion_transporte" placeholder="Leave a comment here"
                        id="descripcion_transporte"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>
            </div>
            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Logistica</center>
                    </strong>
                </h4>
            </div>
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre_logistica">Nombre</label>
                    <input type="text" name="nombre_logistica" id="nombre_logistica" class="form-control"
                        placeholder="Nombre" value="">
                    @error('nombre_logistica')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor_logistica">Costo</label>
                    <input type="number" name="valor_logistica" id="valor_logistica" class="form-control"
                        placeholder="Costo" value="">
                    @error('valor_logistica')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="ubicacion_logistica">Ubicación</label>
                    <input type="text" name="ubicacion_logistica" id="ubicacion_logistica" class="form-control"
                        placeholder="Ubicación" value="">
                    @error('ubicacion_logistica')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="descripcion_logistica">Descripción</label>
                    <textarea class="form-control" name="descripcion_logistica" placeholder="Leave a comment here"
                        id="descripcion_logistica"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>
            </div>

            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Insumos</center>
                    </strong>
                </h4>
            </div>
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre_insumo">Nombre</label>
                    <input type="text" name="nombre_insumo" id="nombre_insumo" class="form-control"
                        placeholder="Nombre" value="">
                    @error('nombre_insumo')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor_insumo">Costo</label>
                    <input type="number" name="valor_insumo" id="valor_insumo" class="form-control"
                        placeholder="Costo" value="">
                    @error('valor_insumo')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="ubicacion_insumo">Ubicación</label>
                    <input type="text" name="ubicacion_insumo" id="ubicacion_insumo" class="form-control"
                        placeholder="Ubicación" value="">
                    @error('ubicacion_insumo')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="descripcion_insumo">Descripción</label>
                    <textarea class="form-control" name="descripcion_insumo" placeholder="Descripción" id="descripcion_insumo"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="form-group col mb-3">
                    <label for="formFile" class="form-label">Subir archivo de cotización</label>
                    <input class="form-control" name="file" type="file" id="file">
                </div>
                <div class="form-group col mb-3">
                    <label for="total" class="form-label">Total cotización</label>
                    <input type="text" name="total" id="total" class="form-control"
                        placeholder="Total cotización" value="" disabled>
                </div>
            </div>
            <div class="mb-3 d-flex flex-row-reverse">
                <button type="submit" class="btn btn-outline-primary"
                    style="color: black; border-color:#FFAA37;">Finalizar
                    cotización</button>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#valor_hotel').on('change', suma);
            $('#valor_restaurante').on('change', suma);
            $('#valor_transporte').on('change', suma);
            $('#valor_logistica').on('change', suma);
            $('#valor_insumo').on('change', suma);

            $('#valor_hotel').val('0');
            $('#valor_restaurante').val('0');
            $('#valor_transporte').val('0');
            $('#valor_logistica').val('0');
            $('#valor_insumo').val('0');

            $('#total').val('0');

            function suma() {
                $('#total').val(
                    parseInt($('#valor_hotel').val()) +
                    parseInt($('#valor_restaurante').val()) +
                    parseInt($('#valor_transporte').val()) +
                    parseInt($('#valor_logistica').val()) +
                    parseInt($('#valor_insumo').val())
                );
            }
        });
    </script>
@stop
