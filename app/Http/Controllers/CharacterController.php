<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
    {
        // Obtén todos los personajes desde la base de datos
        $characters = Character::all();

        // Retorna la vista con los datos de personajes
        return view('characters.index', compact('characters'));
    }

    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index')->with('success', 'Personaje eliminado correctamente.');
    }   

    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
    ]);

        $character->update([
            'name' => $request->name,
            'description' => $request->description,
    ]);

         return redirect()->route('characters.index')->with('success', 'Personaje actualizado correctamente.');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Character::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('characters.index')->with('success', 'Personaje añadido correctamente.');
    }
}
