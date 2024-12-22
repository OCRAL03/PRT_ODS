<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para mostrar el formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Método para manejar el registro de usuarios
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Creación del nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'usuario', // Asignar rol de usuario
        ]);

        // Autenticación del usuario recién registrado
        Auth::login($user);

        // Redireccionar a la página principal
        return redirect('/');
    }

    // Método para manejar el inicio de sesión
    public function login(Request $request)
    {
        // Obtener las credenciales del formulario
        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Redireccionar a la página principal en caso de éxito
            return redirect('/');
        }

        // Redireccionar de vuelta al formulario con un mensaje de error en caso de fallo
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    // Método para manejar el cierre de sesión
    public function logout()
    {
        // Cerrar sesión del usuario
        Auth::logout();

        // Redireccionar a la página principal
        return redirect('/');
    }
}