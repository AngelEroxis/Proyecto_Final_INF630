<?php

namespace App\Http\Controllers\Auth;

use App\Models\pelicula;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Buscar al usuario por el correo electrónico
        $usuario = \App\Models\Usuario::where('Email', $request->Email)->first();

        if (!$usuario) {
            return back()->withErrors(['Email' => 'El correo electrónico no está registrado.']);
        }

        // Verificar manualmente la contraseña
        if (Hash::check($request->password, $usuario->Contraseña)) {
            // Autenticar al usuario
            Auth::login($usuario);
            //dd($usuario->Rol);
            // Redirigir según el rol del usuario
            if ($usuario->Rol === 'administrador') {
                return redirect()->route('admin.index')->with('success', 'Bienvenido Administrador ' . $usuario->Nombre . '!');
            } elseif ($usuario->Rol === 'usuario') {
                return redirect()->route('usuario.index')->with('success', 'Inicio de sesión exitoso. Bienvenido ' . $usuario->Nombre . '!');
            }

            // Si el rol no es reconocido, cerrar sesión y mostrar error
            Auth::logout();
            return back()->withErrors(['Rol' => 'El rol del usuario no está autorizado para iniciar sesión.']);
        } else {
            // Contraseña no coincide
            return back()->withErrors(['password' => 'La contraseña es incorrecta.']);
        }
    }

    


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('peliculas.index');
    }
}
