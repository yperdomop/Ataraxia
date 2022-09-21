<x-app-layout>
    <div class=" w-100">
        <div class="container-fluid">
            <h4>
                <strong>
                    <center>Listado de eventos</center>
                </strong>
            </h4>
            <div class="">
                <a class="btn btn-outline-primary" href=" {{ route('evento.seleccion') }}"
                    style="color: black; border-color:#FFAA37;">Crear un evento</a>
            </div>
        </div>
        <livewire:users.buscar-evento />
        <div class="">
            <a class="btn btn-outline-primary" href=" {{ route('evento.seleccion') }}"
                style="color: black; border-color:#FFAA37;">Crear un evento</a>
        </div>
    </div>



</x-app-layout>
