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

    public function update(Request $request, $id)
{
    $character = Character::findOrFail($id);  // Encontrar el personaje por su ID

    // Validar los datos
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    // Actualizar los datos
    $character->name = $request->name;
    $character->description = $request->description;

    // Si hay una nueva imagen, guardarla
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('characters', 'public');
        $character->image = $imagePath;
    }

    $character->save();

    return redirect()->route('characters.index')->with('success', 'Personaje actualizado correctamente.');
}

    
    
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Subir la imagen
        $imagePath = $request->file('image')->store('characters', 'public'); // 'characters' es el directorio donde se guardará
    
        // Crear el personaje
        $character = new Character();
        $character->name = $request->name;
        $character->description = $request->description;
        $character->image = $imagePath;  // Guardamos la ruta de la imagen en la base de datos
        $character->save();
    
        return redirect()->route('characters.index');
    }
    
    
}
