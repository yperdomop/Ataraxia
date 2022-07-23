<x-app-layout>
    <div class="row">
        <div class="col-3 border border-secondary">
            <div class="col align-self-end">
                <button type="submit" class="btn btn-success">Ver Video</button>
            </div>
        </div>
        <div class="col-9">
            <h2 class="bg-primary p-3 text-white">¿Qué quieres hacer hoy?</h2>
            <div class="row">
                <div class="col">
                    <a class="text-decoration-none" href="">
                        <div class="row display-5">
                            <div class="col link-dark ">
                                Abrir una cuenta
                            </div>
                            <div class="col link-success"><span
                                    class="align-text-bottom fas fa-2xl fa-piggy-bank"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="">
                        <div class="row display-6">
                            <div class="col link-dark ">
                                Invertir
                            </div>
                            <div class="col link-success"><span
                                    class="align-text-bottom fas fa-2xl fa-money-check-alt"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="text-decoration-none" href="{{ route('fintech.evento') }}">
                        <div class="row display-5">
                            <div class="col link-dark ">
                                Gestionar un evento</div>
                            <div class="col link-success"><span
                                    class="align-text-bottom fas fa-2xl fa-globe-americas"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="">
                        <div class="row display-6">
                            <div class="col link-dark ">
                                Gestionar un Crédito
                            </div>
                            <div class="col link-success"><span
                                    class="align-text-bottom fas fa-2xl fa-credit-card"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="text-decoration-none" href="{{ route('fintech.evento') }}">
                        <div class="row display-5">
                            <div class="col link-dark ">
                                Gestionar Financiaciones</div>
                            <div class="col link-success"><span class="align-text-bottom fas fa-2xl fa-coins"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a class="text-decoration-none" href="">
                        <div class="row display-6">
                            <div class="col link-dark ">
                                Gestionar Cotizaciones
                            </div>
                            <div class="col link-success"><span
                                    class="align-text-bottom fas fa-2xl fa-handshake"></span>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
