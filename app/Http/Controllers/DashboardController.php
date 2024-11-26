<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Puedes usar el nombre de un usuario autenticado si existe
        $name = auth()->user()->name ?? 'Invitado';
        return view('dashboard', compact('name'));
    }

    public function store(Request $request)
    {
        // Obtén el nombre enviado desde el formulario
        $name = $request->input('name');

        // Retorna la vista 'dashboard' pasando el nombre
        return view('dashboard', compact('name'));
    }
}