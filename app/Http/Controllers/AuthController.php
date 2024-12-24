<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm(Request $request)
    {
        // Guardar la página de redirección en la sesión
        if ($request->has('redirect')) {
            $request->session()->put('login_redirect', $request->query('redirect'));
        }
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
            'role' => 'required|in:admin,user', // Validar el campo de rol
        ]);

        // Creación del nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Asignar el rol desde el formulario
        ]);

        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login');
    }

    // Método para manejar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Obtener las credenciales del formulario
        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Obtener el usuario autenticado
            $user = Auth::user();
            return $this->handleRedirect($request, $user);
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

    // Método para manejar la redirección después del inicio de sesión o registro
    protected function handleRedirect(Request $request, User $user)
    {
        $redirect = $request->session()->pull('login_redirect', '/');

        if ($user->role === 'admin') {
            if ($redirect === 'statistics') {
                return redirect()->route('admin.statistics');
            }
            return redirect()->route('admin.index');
        } else {
            if ($redirect === 'statistics') {
                return redirect()->route('user.index');
            } elseif ($redirect === 'survey') {
                return redirect()->route('survey.formulario');
            } elseif ($redirect === 'proposals') {
                return redirect()->route('proposals.create');
            }
            return redirect()->route('user.index');
        }
    }
}