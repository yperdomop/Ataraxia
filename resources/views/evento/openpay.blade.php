<x-register-layout>
    <div class="row">
        <div class="col-12">
            <form action="" method="post" id="payment-form" class="formulario" style="width:60%">
                @csrf
                <input type="hidden" name="token_id" id="token_id">
                <h2 class="bg-danger p-2 text-white text-center "> Tarjeta de crédito o débito <br></h2>
                <div class="pt-3 row">
                    <div class="form-group col form-floating mb-3">
                        <input type="text" data-openpay-card="holder_name" class="form-control"
                            placeholder="Nombre del titular" value="{{ old('nombre') }}">
                        <label for="nombre"> * Nombre del titular de la tarjeta</label>
                        @error('nombre')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col form-floating mb-3">
                        <input type="number" data-openpay-card="card_number" class="form-control"
                            placeholder="Número de la targeta" value="{{ old('numero') }}">
                        <label for="numero"> * Número de la tarjeta</label>
                        @error('numero')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="pt-3 row">
                    <div class="form-group col form-floating mb-3">
                        <input type="number" data-openpay-card="expiration_month" class="form-control"
                            placeholder="* Mes de expiración" value="{{ old('mes') }}">
                        <label for="mes"> * Mes de expiración</label>
                        @error('mes')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col form-floating mb-3">
                        <input type="number" data-openpay-card="expiration_year" class="form-control"
                            placeholder="* Año de expiración" value="{{ old('ano') }}">
                        <label for="ano"> * Año de expiración</label>
                        @error('ano')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col form-floating mb-3">
                        <input type="number" data-openpay-card="cvv2" class="form-control"
                            placeholder="Código de seguridad 3 dígitos" value="{{ old('codigo') }}">
                        <label for="fecha"> * Código de seguridad 3 dígitos</label>
                        @error('codigo')
                            <div class="text-danger" style="font-size:12px">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex flex-row-reverse m-4">
                        <img src="{{ asset('img/openpay.png') }}" width="150" height="50" hspace="30">
                        <img src="{{ asset('img/escudo.png') }}" width="150" height="50">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-ataraxia" href="{{ route('evento.pago') }}">Volver</a>
                        <a class="btn btn-ataraxia" id="pay-button">Pagar</a>

                    </div>

                </div>
        </div>
    </div>

    </form>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://resources.openpay.co/openpay.v1.min.js"></script>
        <script type="text/javascript" src="https://resources.openpay.co/openpay-data.v1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                OpenPay.setSandboxMode(true);
                OpenPay.setId({{ env('OPENPAY_ID') }});
                OpenPay.setApiKey({{ env('OPENPAY_PK') }});
                var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
            });
            $('#pay-button').on('click', function(e) {
                e.preventDefault();
                $('#pay-button').prop('disabled', true);
                var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
                $('#pay-button').on('click', function(event) {
                    event.preventDefault();
                    $("#pay-button").prop("disabled", true);
                    OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);
                });
            });

            var success_callbak = function(response) {
                var token_id = response.data.id;
                $('#token_id').val(token_id);
                $('#payment-form').submit();
            };

            var error_callbak = function(response) {
                var desc = response.data.description != undefined ?
                    response.data.description : response.message;
                alert("ERROR [" + response.status + "] " + desc);
                $("#pay-button").prop("disabled", false);
            };
        </script>
    @endpush
</x-register-layout>
