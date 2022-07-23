<x-app-layout>
    <div>
        <h5 class="bg-primary p-2 text-white"> Gestión de Eventos <br>Asistir a un Evento</h5>
    </div>
    <div class="col-8">
        <div class="pt-3 row">
            <h2>
                <strong>
                    COTIZACIONES
                </strong>
            </h2>
            <h5>Recibidas</h5>
        </div>
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
                    <th scope="row"></th>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>6</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td>7</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td width="10px">
                        <a href=""style="color: black; border-color:#FFAA37;" class="btn btn-outline-primary"
                            title="Ver Detalle"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td width="10px">
                        <form action="" method="" onSubmit="return confirm('Seguro desea eliminar?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger"
                                style="color: black; border-color:#FFAA37;" title="Eliminar"> <i
                                    class="bi bi-trash3-fill"></i></button>
                        </form>
                </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>
