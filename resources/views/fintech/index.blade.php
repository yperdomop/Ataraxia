<x-app-layout>
    <div class="vh-100">
        <div class="row">
            <div class=" vh-100 col-4 d-none d-sm-flex ">
                <video src="{{ asset('videos/video-1.mp4') }}"controls autoplay muted></video>
            </div>
            <div class="col-8 col-sm-8">

                <h2 class="bg-dark p-3 text-white rounded-3 "><i class="fas fa-chalkboard"></i> ¿Qué quieres hacer hoy?
                </h2>
                <div class="col p-3 d-flex flex-column w-50 mx-auto">
                    <a class="text-decoration-none h-100" href="">
                        <div class="row h-100 d-flex align-items-center">
                            <div class="col link-dark "><br>
                                <h4>
                                    <center><strong>Abrir una cuenta</strong></center>
                                </h4>
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/icono-ahorro.png') }}" alt="">
                            </div>
                        </div>
                    </a>

                </div>

                <div class="col p-3 d-flex flex-column w-50 mx-auto">
                    <a class="text-decoration-none h-100" href="">
                        <div class="row h-100 d-flex align-items-center">
                            <div class="col link-dark "><br>
                                <h4>
                                    <p>
                                        <center><strong>Gestionar un Crédito</strong></center>
                                    </p>
                                </h4>
                            </div>
                            <div class="col link-success">
                                <img src="{{ asset('img/icono-credito.png') }}" alt="">
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
