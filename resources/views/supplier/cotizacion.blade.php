@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('supplier.cotizaciones.store', $event) }}" enctype="multipart/form-data">
            @csrf

            <livewire:supplier.form-cotizacion />
            <div class="mb-3 d-flex flex-row-reverse">
                <button type="submit" class="btn btn-outline-primary" style="color: black; border-color:#FFAA37;">Finalizar
                    cotización</button>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#valor_hotel').on('change', suma);
            $('#valor_restaurante').on('change', suma);
            $('#valor_transporte').on('change', suma);
            $('#valor_logistica').on('change', suma);
            $('#valor_insumo').on('change', suma);

            $('#valor_hotel').val('0');
            $('#valor_restaurante').val('0');
            $('#valor_transporte').val('0');
            $('#valor_logistica').val('0');
            $('#valor_insumo').val('0');

            $('#total').val('0');

            function suma() {
                $('#total').val(
                    @if ($event->providerTypes->filter(function ($item) {
                            return $item->name == 'Agencia de viajes' || $item->name == 'Hotel';
                        })->count() > 0)
                        parseInt($('#valor_hotel').val())
                    @else
                        0
                    @endif +
                    @if ($event->providerTypes->filter(function ($item) {
                            return $item->name == 'Agencia de viajes' || $item->name == 'Restaurante';
                        })->count() > 0)
                        parseInt($('#valor_restaurante').val())
                    @else
                        0
                    @endif +
                    @if ($event->providerTypes->filter(function ($item) {
                            return $item->name == 'Agencia de viajes' || $item->name == 'Transporte';
                        })->count() > 0)
                        parseInt($('#valor_transporte').val())
                    @else
                        0
                    @endif +
                    @if ($event->providerTypes->filter(function ($item) {
                            return $item->name == 'Agencia de viajes' || $item->name == 'Logistica';
                        })->count() > 0)
                        parseInt($('#valor_logistica').val())
                    @else
                        0
                    @endif +
                    @if ($event->providerTypes->filter(function ($item) {
                            return $item->name == 'Agencia de viajes' || $item->name == 'Implementos deportivos';
                        })->count() > 0)
                        parseInt($('#valor_insumo').val())
                    @else
                        0
                    @endif
                );
            }
        });
    </script>
@stop
