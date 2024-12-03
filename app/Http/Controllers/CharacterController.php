<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
     /**
     * Muestra una lista de todos los personajes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtén todos los personajes desde la base de datos
        $characters = Character::all();

        // Retorna la vista con los datos de personajes
        return view('characters.index', compact('characters'));
    }
         /**
     * Elimina un personaje de la base de datos.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\RedirectResponse
     */


    public function destroy(Character $character)
    {
         // Elimina el personaje recibido como parámetro
        $character->delete();

        // Redirige a la lista de personajes con un mensaje de éxito
        return redirect()->route('characters.index')->with('success', 'Personaje eliminado correctamente.');
    }   

    /**
     * Actualiza un personaje existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
{
    // Encuentra el personaje por su ID
    $character = Character::findOrFail($id);  // Encontrar el personaje por su ID

    // Valida los datos enviados en la petición
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
    // Guarda los cambios en la base de datos
    $character->save();
    // Redirige a la lista de personajes con un mensaje de éxito
    return redirect()->route('characters.index')->with('success', 'Personaje actualizado correctamente.');
}
     /**
     * Crea un nuevo personaje y lo guarda en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    
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
        $character->image = $imagePath;  
        // Guardamos la ruta de la imagen en la base de datos
        $character->save();
        // Redirige a la lista de personajes
        return redirect()->route('characters.index');
    }
    
    
}
