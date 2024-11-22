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


Route::get('/game/start', [GameController::class, 'start'])->name('game.start');
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

// Ruta para el primer capítulo
Route::get('/chapter1', function () {
    return view('game.chapter1');
})->name('chapter1');

// Opción 1: Robar la Navidad
Route::get('/chapter2/option1', function () {
    return view('chapter2.option1');  // Vista que se carga si el jugador decide robar la Navidad
})->name('chapter2.option1');

// Opción 2: Bajar a la Villa Quién
Route::get('/chapter2/option2', function () {
    return view('chapter2.option2');  // Vista que se carga si el jugador decide bajar a la Villa Quién
})->name('chapter2.option2');


// Ruta para el capítulo 2 (opción 1: robar la Navidad)
Route::get('/chapter2/robbery', function () {
    return view('chapter2.robbery');
})->name('chapter2.robbery');

// Ruta para el capítulo 2 (opción 2: reflexionar)
Route::get('/chapter2/change', function () {
    return view('chapter2.change');
})->name('chapter2.change');

// Y más rutas según las opciones de los capítulos siguientes...
