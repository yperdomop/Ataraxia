@extends('adminlte::page')

@section('content')
    <table class="table table-bordered"><br>
        <thead class="table-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nombre Compañia</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Fin</th>
                <th scope="col">Tipo</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                        </label>
                    </div>
                </th>
                <td>1</td>
                <td>Medellín</td>
                <td></td>
                <td></td>
                <td></td>
                <td width="10px">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-primary" href="{{ route('supplier.cotizacion') }}"
                            style="color: black; border-color:#FFAA37;">cotizar</a>

                    </div>
            </tr>
            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                        </label>
                    </div>
                </th>
                <td>2</td>
                <td>Bogotá</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-primary" href="{{ route('supplier.cotizacion') }}"
                            style="color: black; border-color:#FFAA37;">cotizar</a>

                    </div>
                </td>

            </tr>
            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                        </label>
                    </div>
                </th>
                <td>3</td>
                <td>Neiva</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-primary" href="{{ route('supplier.cotizacion') }}"
                            style="color: black; border-color:#FFAA37;">cotizar</a>

                    </div>
                </td>

            </tr>
        </tbody>
    </table>
@stop
