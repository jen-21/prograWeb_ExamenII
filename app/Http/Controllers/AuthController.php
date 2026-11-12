<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de inicio de sesión.
     */
    public function login()
    {
        return view('auth.login');
    }


    public function authenticate(Request $request)
    {
        // Validar los datos recibidos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        if (auth()->attempt($credentials)) {

            // Regenerar la sesión por seguridad
            $request->session()->regenerate();

            // Redirigir al dashboard
            return redirect()->intended('/dashboard');
        }

        // Si las credenciales son incorrectas
        return back()->withErrors([
            'email' => 'El correo o la contraseña son incorrectos.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        // Cerrar la sesión del usuario
        auth()->logout();

        // Invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token CSRF
        $request->session()->regenerateToken();

        // Regresar al inicio de sesión
        return redirect('/');
    }


}
