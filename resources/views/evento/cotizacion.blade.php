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
            </>
            <table class="table table-bordered"><br>
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Cotización No</th>
                        <th scope="col">Nombre Proveedor</th>
                        <th scope="col">Fecha Cotización</th>
                        <th scope="col">Costo Total</th>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
                        </td>
                        <td width="10px">
                            <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0"> <img
                                        src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                        title="Eliminar"></button>
                            </form>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
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
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                </label>
                            </div>
                        </th>
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
                        </td>
                        <td width="10px">
                            <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0"> <img
                                        src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                        title="Eliminar"></button>
                            </form>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                </label>
                            </div>
                        </th>
                        <td>4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
                        </td>
                        <td width="10px">
                            <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0"> <img
                                        src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                        title="Eliminar"></button>
                            </form>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                </label>
                            </div>
                        </th>
                        <td>5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
                        </td>
                        <td width="10px">
                            <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0"> <img
                                        src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                        title="Eliminar"></button>
                            </form>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                </label>
                            </div>
                        </th>
                        <td>6</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
                        </td>
                        <td width="10px">
                            <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0"> <img
                                        src="{{ asset('img/icono-eliminar.png') }}" style="width:40px;height:40px;"
                                        title="Eliminar"></button>
                            </form>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                </label>
                            </div>
                        </th>
                        <td>7</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px">
                            <a href=""><img src="{{ asset('img/icono-ver.png') }}"
                                    style="width:50px;height:50px;" title="Ver Detalle"> </a>
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
                </tbody>
            </table>
        </div>

        <div class="col-4">
            <div class="row m-5">
                <h2>
                    <center><strong> Evento </strong></center>
                </h2>
                <div> <iframe style="border:0" loading="lazy" allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade" src="{{ $url }}" width="300"
                        height="200"></iframe>
                </div>
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

</x-app-layout>
