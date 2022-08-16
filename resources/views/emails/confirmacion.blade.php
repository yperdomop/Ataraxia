<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p> Cordial saludo {{ $user->first_name }} {{ $user->last_name }}: </p>

    <p> Confirmamos que hemos recibido exitosamente su pago, a continuación relacionamos sus credenciales de acceso a
        la plataforma Ataraxia: </p>
    <p> Usuario: {{ $user->email }} <br> Contraseña: {{ $user->identification_document }} </p>
    <p> Puedes ingresar desde el siguiente link <a href="{{ route('login') }}">{{ route('login') }}<a></p>
    <br>
    <p>
        Atentamente,<br>
        Ataraxia.
    </p>
</body>

</html>
