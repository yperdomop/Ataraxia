<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style type="text/css">
        body {
            font-family: "Brush Script MT", cursive;
        }
    </style>
</head>

<body>
    <h1>
        <center>Cotización</center>
    </h1>
    <p>
    <h3><b>Proveedor:</b> {{ $cotizacion->company->bussiness_name }}
        <br />
        <b>Evento:</b> {{ $cotizacion->event->name }}
        <br />
        <b>Fecha:</b> {{ $cotizacion->event->date }}
        <br />
        <b>Organizador:</b> {{ $cotizacion->event->company->bussiness_name }}
        <br />
        <b>Ubicación:</b> {{ $cotizacion->event->address }}
    </h3>
    </p>
    <h1>
        <center>Detalles</center>
    </h1>
    <table table border="2" align="center" bordercolor="blue" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th bgcolor="black" style="color:white;">Tipo de servicio</th>
                <th bgcolor="black" style="color:white;">Nombre</th>
                <th bgcolor="black" style="color:white;">Dirección</th>
                <th bgcolor="black" style="color:white;">Tipo de transporte</th>
                <th bgcolor="black" style="color:white;">Descripción</th>
                <th bgcolor="black" style="color:white;">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cotizacion->details as $detalle)
                <tr>
                    <td align="center">
                        {{ $detalle->service_type }}
                    </td>
                    <td align="center">
                        {{ $detalle->Property_name }}
                    </td>
                    <td align="center">
                        {{ $detalle->location }}
                    </td>
                    <td align="center">
                        {{ $detalle->transport_type }}
                    </td>
                    <td align="center">
                        {{ $detalle->description }}
                    </td>
                    <td align="center">
                        {{ '$' . number_format($detalle->price, 0, ',', '.') }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table><br>
    <h2><b>Total cotización:</b> ${{ $cotizacion->price }}
    </h2>
</body>

</html>
