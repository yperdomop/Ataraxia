@extends('adminlte::page')

@section('title', 'Editar Cotización')

@section('content_header')
    <a class="btn btn-link" href=""><u>Volver</u></a>
    <h1 class="text-center">Editar Cotización</h1>

    <div class="container-fluid">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf

            <div class="pt-3 row">
                <h4>
                    <strong>
                        <center>Hotel</center>
                    </strong>
                </h4>
            </div>
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre_hotel">Nombre del Hotel</label>
                    <input type="text" name="nombre_hotel id="nombre_hotel" class="form-control"
                        placeholder="Nombre del hotel" value="">
                    @error('nombre_hotel')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor_hotel">Costo del Hotel</label>
                    <input type="number" name="valor_hotel" id="valor_hotel" class="form-control"
                        placeholder="Costo del hotel" value="">
                    @error('valor_hotel')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="ubicacion_hotel">Ubicación del Hotel</label>
                    <input type="text" name="ubicacion_hotel" id="ubicacion_hotel" class="form-control"
                        placeholder="Ubicación del hotel" value="">
                    @error('ubicacion_restaurante')
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
