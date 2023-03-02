<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
<p>Hola! Se ha registrado correctamente.</p>
<p>Estos son los datos del usuario que ha realizado el registro:</p>
<ul>
    <li>Nombre: {{$post->nombre}} {{$post->apellido}}</li>
    <li>Cédula: {{$post->cedula}}</li>
    <li>Celular: {{$post->celular}}</li>
    <li>Pais: {{$post->pais}}</li>
    <li>Direccion: {{$post->direccion}}</li>

</ul>
</body>
</html>
