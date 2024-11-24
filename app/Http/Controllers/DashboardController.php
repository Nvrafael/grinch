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
}