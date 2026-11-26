<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de videojuegos</title>
</head>
<body>
    <h1>Catálogo de videojuegos</h1>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Precio</th>
            <th></th>
        </tr>
        @foreach ($videojuegos as $videojuego)
            <tr>
                <td>{{ $videojuego['id'] }}</td>
                <td>{{ $videojuego['nombre'] }}</td>
                <td>{{ $videojuego['plataforma'] }}</td>
                <td>{{ $videojuego['precio'] }} &euro;</td>
                <td><a href="{{ route('videojuegos.show', $videojuego['id']) }}">Ver</a></td>
            </tr>
        @endforeach
    </table>
    <p><a href="{{ route('estadisticas') }}">Ver estadísticas</a></p>
</body>
</html>