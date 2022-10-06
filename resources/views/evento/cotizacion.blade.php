<x-app-layout>

    <h5 class="bg-secondary p-2 text-white"> Gestión de Eventos <br>Asistir a un Evento</h5>
    <livewire:users.cotizaciones :evento="$evento">
        <div>
            <a class="btn btn-ataraxia" href="{{ route('evento.gestion') }}">Volver</a>
        </div>

</x-app-layout>
