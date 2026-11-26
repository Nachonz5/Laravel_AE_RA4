<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class VideojuegoINZController extends Controller
{
    /**
     * Catálogo de videojuegos (array temporal, sin base de datos).
     */
    public static function catalogo(): array
    {
        return [
            ['id' => 1, 'nombre' => 'The Witcher 3',               'plataforma' => 'PC',              'precio' => 29.99],
            ['id' => 2, 'nombre' => 'Elden Ring',                  'plataforma' => 'PC',              'precio' => 59.99],
            ['id' => 3, 'nombre' => 'God of War Ragnarok',         'plataforma' => 'PlayStation',     'precio' => 69.99],
            ['id' => 4, 'nombre' => 'Spider-Man 2',                'plataforma' => 'PlayStation',     'precio' => 59.99],
            ['id' => 5, 'nombre' => 'Halo Infinite',               'plataforma' => 'Xbox',            'precio' => 49.99],
            ['id' => 6, 'nombre' => 'Forza Horizon 5',             'plataforma' => 'Xbox',            'precio' => 39.99],
            ['id' => 7, 'nombre' => 'Zelda: Tears of the Kingdom', 'plataforma' => 'Nintendo Switch', 'precio' => 59.99],
            ['id' => 8, 'nombre' => 'Mario Kart 8 Deluxe',         'plataforma' => 'Nintendo Switch', 'precio' => 49.99],
        ];
    }
    // Listado de todos los videojuegos
    public function index()
    {
        $videojuegos = self::catalogo();
        return view('videojuegos.index', compact('videojuegos'));
    }
    // Un videojuego concreto por su id (parámetro de ruta)
    public function show($id)
    {
        $videojuego = collect(self::catalogo())->firstWhere('id', (int) $id);
        abort_if(!$videojuego, 404);
        return view('videojuegos.show', compact('videojuego'));
    }
    // Videojuegos de una plataforma (parámetro de petición: ?plataforma=PC)
    public function plataformas(Request $request)
    {
        $plataforma = $request->input('plataforma');
        if (!$plataforma) {
            return response()->json(['error' => 'Indica la plataforma: ?plataforma=PC'], 400);
        }
        $resultado = [];
        foreach (self::catalogo() as $videojuego) {
            if (strtolower($videojuego['plataforma']) == strtolower($plataforma)) {
                $resultado[] = $videojuego;
            }
        }
        return response()->json($resultado);
    }
}