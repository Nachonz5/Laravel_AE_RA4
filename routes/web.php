<?php
use App\Http\Controllers\EstadisticasINZController;
use App\Http\Controllers\VideojuegoINZController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// Rutas del catálogo agrupadas con el prefijo /videojuegos
Route::prefix('videojuegos')->group(function () {
    Route::get('/', [VideojuegoINZController::class, 'index'])->name('videojuegos.index');
    Route::get('/plataformas', [VideojuegoINZController::class, 'plataformas'])->name('videojuegos.plataformas');
    Route::get('/{id}', [VideojuegoINZController::class, 'show'])->name('videojuegos.show');
});
// Estadísticas: controlador invocable protegido con el middleware auth
Route::get('/estadisticas', EstadisticasINZController::class)
    ->middleware('auth')
    ->name('estadisticas');

Route::get('/login', function () {
    return 'Aqui iría la sesion';
})->name('login');