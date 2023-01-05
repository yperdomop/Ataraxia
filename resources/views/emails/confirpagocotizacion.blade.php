<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p> Cordial saludo {{ $quotation->event->company->bussiness_name }}</p>
    {{ $quotation->event->company->legal_representative }}: </p>

    <p> Confirmamos que se ha registrado satisfactoriamente el pago de la cotización Número {{ $quotation->id }} del
        evento {{ $quotation->event->name }} con el proveedor {{ $quotation->company->bussiness_name }}
        en la plataforma Ataraxia: </p>

    <p>
        Atentamente,<br>
        Ataraxia.
    </p>
</body>

</html>
