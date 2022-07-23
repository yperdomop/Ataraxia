<x-app-layout>
    @if (Auth::user()->company->documents->count() == 0)
        Debe cargar documentos
    @endif
    <div class="position-relative"> <img src="img/fondo-login.png" class="img-fluid">
        <div class="position-absolute bottom-0 end-0 mb-5">
            Conoce más aquí
        </div>
    </div>
</x-app-layout>
