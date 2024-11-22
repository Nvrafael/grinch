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