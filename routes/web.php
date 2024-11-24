<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CharacterController;

// Página de inicio
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');

// Ruta del Dashboard (GET)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas de About y personajes
Route::get('/about/us', [AboutController::class, 'index'])->name('about.us');
Route::get('/characters/info', [CharacterController::class, 'index'])->name('characters.info');
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
Route::delete('/characters/{character}', [CharacterController::class, 'destroy'])->name('characters.destroy');
Route::put('/characters/{character}', [CharacterController::class, 'update'])->name('characters.update');

// Rutas de los capítulos del juego
Route::get('/game/start', [GameController::class, 'start'])->name('game.start');
Route::get('/game/{chapter}', [GameController::class, 'showChapter'])->name('game.chapter');
Route::post('/game/{chapter}/choose', [GameController::class, 'chooseOption'])->name('game.choose');
