<x-app-layout>
    <a class="btn btn-link" href="{{ route('evento.gestion') }}">Volver</a>
    <br>

    <div x-data="{ price: 500000, bono: '', enable: false, msg: '' }" class="container p-3 my-3"
        style="border-style: solid;border-width: 2px;border-color:Gainsboro">
        <div class="row">
            <div class="col col-sm-4">
                <table class="table"><br>

                    <tbody class="table_pagar">
                        <tr>
                            <th scope="col" class="rounded-3">
                                <center><img src="{{ asset('img/Recurso-2.png') }}" width="150" height="25">
                                </center>
                                <center><br>
                                    <font color="white">minombre@correo.com</font>
                                </center>
                            </th>

                        </tr>

                        <tr>
                            <th scope="col">Total a pagar</th>
                        </tr>

                        <tr>
                            <td>
                                <font color="white" x-text="price">
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Referencia de pago</th>
                        </tr>
                        <tr>
                            <td>
                                <font color="white">
                                    ATA1234-56</font>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Descripción</th>
                        </tr>
                        <tr>
                            <td>
                                <font color="white">
                                    Nombre del evento</font>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Fecha</th>
                        </tr>
                        <tr>
                            <td>
                                <font color="white">{{ date('d/m/Y') }}</font>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=col col-sm-8>
                <h5 class="text-center">MEDIOS DE PAGOS</h5>

                <p><b>Selecciona el medio de pago</b></p>

                <div class="container  p-1 my-1" style="border-style: solid;border-width: 1px;border-color:Gainsboro">
                    <button type="button" class='btn' data-bs-toggle="modal" data-bs-target="#modal1"> <img
                            src="{{ asset('img/openpay.png') }}" width="100" height="50" />&nbsp;&nbsp;&nbsp
                        <b> Realiza tu pago con tarjeta débito o crédito </b></button>
                </div><br>

                <div class="container  p-1 my-1" style="border-style: solid;border-width: 1px;border-color:Gainsboro">
                    <button type="button" class='btn' data-bs-toggle="modal" data-bs-target="#modal3"> <img
                            src="{{ asset('img/bitcoin-icon.png') }}" width="100" height="50" />&nbsp;&nbsp;&nbsp
                        <b> Realiza tu pago con Bitcoin</b></button>
                </div><br>

                <div class="container  p-1 my-1" style="border-style: solid;border-width: 1px;border-color:Gainsboro">
                    <div class='btn'> <img src="{{ asset('img/cupon.png') }}" width="100"
                            height="50" />&nbsp;&nbsp;&nbsp
                        <b> Redime tu cupón</b>
                        <input type="text" x-model="bono"
                            x-on:blur="if (bono =='AB100') {price = price - 100000; enable=true; msg='Bono redimido'}else{msg='Bono no válido'}"
                            x-bind:disabled="enable" />
                        <span class="text-danger" x-text="msg"></span>
                    </div>
                </div><br>
                <h6>
                    <center>No deseo continuar el proceso</center>
                </h6>
                <h6>
                    <center>Si lo requieres puedes contactarte con la empresa en el correo electrónico
                        <b>minombre@correo.com</b>
                    </center>
                </h6>
            </div>
        </div>

    </div>

    {{-- modales --}}
    <!-- Wompi -->
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <img src="{{ asset('img/pago-icon.png') }}" width="350" height="150" </div>
                        <div class="modal-footer">
                            <button type="button" class="btn"style="color: black; background-color:#FFAA37;"
                                data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paycash -->
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paycash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="img/pago-icon.png" width="350" height="150" </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bitcoin -->
    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">bitcoin</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src=" {{ asset('img/QR-Bitcoin.png') }} " width="300" </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-ataraxia" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
