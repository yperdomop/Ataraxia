@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="pt-3 row">
            <h4>
                <strong>
                    <center>TRANSPORTE</center>
                </strong>
            </h4>
        </div>
        <form method="" action="">
            @csrf
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre">Tipo de transporte</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Seleccione el destino</option>
                        <option value="1">Ciudad-Ciudad</option>
                        <option value="2">Terminal-Hotel-terminal</option>
                        <option value="3">Hotel-Evento-Hotel</option>
                        <option value="3">Otro</option>
                    </select>
                </div>
                <div class="form-group col mb-3">
                    <label for="nombre">Nombre de la compañía</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Nombre de la compañía" value="">
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor">Costo del transporte</label>
                    <input type="number" name="valor" id="valor" class="form-control"
                        placeholder="Costo del transporte" value="">
                    @error('valor')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="floatingTextarea">Descripción</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>


            </div>
        </form>
        <div class="pt-3 row">
            <h4>
                <strong>
                    <center>HOSPEDAJE</center>
                </strong>
            </h4>
        </div>
        <form method="" action="">
            @csrf
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre">Hotel</label>
                    <input type="text" name="hotel" id="hotel" class="form-control" placeholder="Hotel"
                        value="">
                </div>
                <div class="form-group col mb-3">
                    <label for="nombre">Nombre del hotel</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del hotel"
                        value="">
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor">Costo del hotel</label>
                    <input type="number" name="valor" id="valor" class="form-control" placeholder="Costo del hotel"
                        value="">
                    @error('valor')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor">Ubicación del hotel</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control"
                        placeholder="Ubicación del hotel" value="">
                    @error('ubicacion')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="floatingTextarea">Descripción</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>


            </div>
        </form>
        <div class="pt-3 row">
            <h4>
                <strong>
                    <center>Alimentación</center>
                </strong>
            </h4>
        </div>
        <form method="" action="">
            @csrf
            <div class="pt-3 row">
                <div class="form-group col mb-3">
                    <label for="nombre">Restaurante</label>
                    <input type="text" name="hotel" id="hotel" class="form-control" placeholder="Restaurante"
                        value="">
                </div>
                <div class="form-group col mb-3">
                    <label for="nombre">Nombre del restaurante</label>
                    <input type="text" name="restaurante" id="restaurante" class="form-control"
                        placeholder="Nombre del restaurante" value="">
                    @error('nombre')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor">Costo del restaurante</label>
                    <input type="number" name="costo" id="costo" class="form-control"
                        placeholder="Costo del restaurante" value="">
                    @error('costo')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col mb-3">
                    <label for="valor">Ubicación del restaurante</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control"
                        placeholder="Ubicación del hotel" value="">
                    @error('ubicacion')
                        <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="floatingTextarea">Descripción</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                </div>
                <div>
                    <a class="btn btn-ataraxia" href="">Agregar</a>
                </div>


            </div>
        </form>
    </div>
@stop
