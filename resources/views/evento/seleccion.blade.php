<x-app-layout>
    <a class="btn btn-link" href="{{ route('evento.index') }}">Volver</a>
    <div><br>
        <h2 class="bg-primary p-3 text-white">Gestión de Eventos</h2>
    </div>
    <div class=" w-100 vh-100 d-flex align-items-center">
        <div style="background-color: rgba(0, 0, 0, 0.25)" class="border w-50 min-h-50 p-3 mx-auto text-white">
            <h3 class="text-center opacity-100">Crea tu Evento</h3>
            <p class="fs-3">¿ Qué rol tendrás en el evento ?</p>
            <div class="d-flex justify-content-evenly">
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="radio" name="prueba" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Asistir a un Evento</label>
                </div>
                <div class="form-check form-switch fs-4">
                    <input class="form-check-input" type="radio" name="prueba" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Organizar un evento</label>
                </div>


            </div>

            <div class="w-100 p-3 text-center">
                <a class="btn-ataraxia" href="{{ route('evento.gestion') }}" role="button">Iniciar</a>
            </div>
        </div>
    </div>


</x-app-layout>
