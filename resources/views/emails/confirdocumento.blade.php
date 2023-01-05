<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p> Cordial saludo {{ $document->documentable->legal_representative }}: <br>
        Representante legal de {{ $document->documentable->bussiness_name }}
    </p>

    <p> {{ $document->document_type->name }} {{ $document->status }} </p>
    <br>
    <p>
        Atentamente,<br>
        Ataraxia.
    </p>
</body>

</html>
