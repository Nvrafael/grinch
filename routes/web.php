<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CharacterController;


Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::post('/dashboard', function (\Illuminate\Http\Request $request) {
    // Validar que el nombre no esté vacío
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Pasar el nombre al dashboard
    $name = $request->input('name');
    return view('dashboard', compact('name'));
})->name('dashboard');



Route::get('/about/us', [AboutController::class, 'index'])->name('about.us');
Route::get('/characters/info', [CharacterController::class, 'index'])->name('characters.info');
// Ruta para mostrar la lista de personajes
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
//Ruta para almacenar un personaje nuevo
Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
//Ruta para eliminar un personaje.
Route::delete('/characters/{character}', [CharacterController::class, 'destroy'])->name('characters.destroy');
// Ruta para editar un personaje
Route::put('/characters/{character}', [CharacterController::class, 'update'])->name('characters.update');

//Rutas para los capitulos de la historia.
Route::get('/game/start', [GameController::class, 'start'])->name('game.start');
Route::get('/game/{chapter}', [GameController::class, 'showChapter'])->name('game.chapter');
Route::post('/game/{chapter}/choose', [GameController::class, 'chooseOption'])->name('game.choose');


// Y más rutas según las opciones de los capítulos siguientes...
