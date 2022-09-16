<x-app-layout>

    <div class=" w-100 vh-100">
        <div class=" w-100 h-100 d-flex align-items-center fondoimg "
            style="background-image:url({{ asset('img/fondo-evento.jpg') }});">
            <div class="w-50 min-h-50 p-3 mx-auto">

                <div style="background-color: white">
                    <img src="{{ asset('img/evento-1.png') }}" class="img-fluid" alt="...">
                    <h3>
                        <center>Que rol tendrás en el evento ?</center>
                    </h3>
                    <div class="d-flex justify-content-evenly">
                        <div>
                            <a href="{{ route('evento.gestion') }}"><img src="{{ asset('img/evento-3.png') }}"></a>
                            <h4><br>
                                <center>Organizar un evento</center>
                            </h4>
                        </div>
                        <div>
                            <a href=""><img src="{{ asset('img/evento-2.png') }}"></a>
                            <h4><br>
                                <center>Asistir a un evento</center>
                            </h4>
                        </div>
                    </div>

                </div><br>
                <a class="btn btn-ataraxia" href="{{ route('evento.lista') }}">Volver</a>
            </div>

        </div>
    </div>

</x-app-layout>
