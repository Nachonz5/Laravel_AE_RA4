<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $videojuego['nombre'] }}</title>
</head>
<body>
    <h1>{{ $videojuego['nombre'] }}</h1>
    <p>ID: {{ $videojuego['id'] }}</p>
    <p>Plataforma: {{ $videojuego['plataforma'] }}</p>
    <p>Precio: {{ $videojuego['precio'] }} &euro;</p>
    <p><a href="{{ route('videojuegos.index') }}">Volver al listado</a></p>
</body>
</html>