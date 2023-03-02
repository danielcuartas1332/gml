<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>
<body>
<p>Hola! Este es el informe de registros.</p>
<table >
    <thead>
        <tr>
            <td>Pais</td>
            <td>Cantidad</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>

                <td>{{$post->pais}}</td>
                <td>{{$post->count}}</td>

            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
