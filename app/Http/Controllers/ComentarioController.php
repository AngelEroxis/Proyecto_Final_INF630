<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'Comentario' => 'required|string|max:500',
        ]);

        Comentario::create([
            'id_pelicula' => $id,
            'id_usuario' => Auth::id(), 
            'Comentario' => $request->Comentario,
        ]);

        return redirect()->route('peliculas.show', $id)->with('success', 'Comentario agregado exitosamente.');
    }
}
