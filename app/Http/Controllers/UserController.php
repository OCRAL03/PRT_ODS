<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Método para mostrar el panel de usuario
    public function index()
        {
            // Obtener las encuestas del usuario autenticado
            $userSurveys = Survey::where('user_id', Auth::id())->get();

            // Pasar las encuestas a la vista
            return view('user.index', compact('userSurveys'));
        }
    
    public function profile()
    {
        $userStats = auth()->user()->statistics;

        return view('user.profile', compact('userStats'));
    }

    public function update(Request $request)
        {
            $user = Auth::user();

            // Validar los datos del formulario
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            // Actualizar los datos del usuario
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect()->route('user.profile')->with('success', 'Perfil actualizado correctamente.');
        }

}