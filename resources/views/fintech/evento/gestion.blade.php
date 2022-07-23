<x-app-layout>
    <div>
        <h5 class="bg-primary p-2 text-white"> Gestión de Eventos <br>Asistir a un Evento</h5>
    </div>
    <div class="col-8">
        <div class="pt-3 row">
            <h4>
                <strong>
                    <center>Para comenzar compártanos la siguiente información</center>
                </strong>
            </h4>
        </div>
        <form method="" action="">
            <input type="text" class="form-control" placeholder="Nombre del Evento">

            <div class="pt-3 row">
                <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Ciudad del Evento">
                </div>
                <div class="form-group col">
                    <input type="date" class="form-control" placeholder="Fecha: D/M/A">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Ciudad de Origen:">
                </div>
            </div>

            <div class="pt-3 row">
                <div class="form-group col">
                    <input type="number" class="form-control" placeholder="Pasajeros:Adultos Menores de Edad">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Deporte:">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Escenario Deportivo:">
                </div>
            </div>

            <div class="pt-3 row">
                <div class="form-group col">
                    <input type="test" class="form-control" placeholder="Medio de Transporte:">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Translados:">
                </div>
                <div class="form-group col">
                    <input type="text" class="form-control" placeholder="Qué proveedores requieres para tu evento:">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Observaciones:</textarea>
            </div>
        </form>
        <div class="d-flex flex-row-reverse pt-3">
            <a class="btn btn-success" href="{{ route('fintech.evento.cotizacion') }}" role="button">Solicitar
                Cotización</a>
        </div>
    </div>

</x-app-layout>
