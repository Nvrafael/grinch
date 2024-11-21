<?php

use Illuminate\Support\Facades\Route;

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