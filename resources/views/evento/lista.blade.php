<x-app-layout>
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" style="background: rgba(0,0,0, 0.80);color:#FFAA37;"
            role="alert">
            <center>
                <h2>{!! session('info') !!}</h2>
            </center>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
