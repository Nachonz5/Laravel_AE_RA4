<?php
namespace App\Http\Controllers;
class EstadisticasINZController extends Controller
{
    public function __invoke()
    {
        $videojuegos = VideojuegoINZController::catalogo();
        $total = count($videojuegos);
        $plataformas = count(array_unique(array_column($videojuegos, 'plataforma')));
        $precioMedio = round(array_sum(array_column($videojuegos, 'precio')) / $total, 2);
        return view('estadisticas', compact('total', 'plataformas', 'precioMedio'));
    }
}