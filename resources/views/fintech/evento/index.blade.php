<x-app-layout>
    <div>
        <h2 class="bg-primary p-3 text-white">Gestión de Eventos</h2>
    </div>
    <div class=" w-100 vh-100 d-flex align-items-center">
        <div style="background-color: rgba(0, 0, 0, 0.25)" class="border w-50 p-3 mx-auto text-white">
            <h3 class="text-center opacity-100">Crea tu Evento</h3>
            <p>¿ Qué rol tendrás en el evento ?</p>
            <div class="d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-success  text-white">Asistir a un evento</button>
                <button type="button" class="btn btn-outline-primary  text-white">Organizar un evento</button>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Asistir a un Evento</label>
            </div>
            <div class="w-100 p-3 text-center">
                <a class="btn btn-success" href="{{ route('fintech.evento.gestion') }}" role="button">Iniciar</a>
            </div>

        </div>
</x-app-layout>
