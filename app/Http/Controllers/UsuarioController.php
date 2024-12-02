<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class UsuarioController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::with('comentarios.usuario')->get();
        return view('usuario.index', compact('peliculas')); // Vista para el usuario
    }

}

