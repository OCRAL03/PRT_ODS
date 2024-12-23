<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Página principal
    public function index()
    {
        return view('home');
    }

    // Página para invitar a llenar encuestas
    public function survey()
    {
        return view('survey.index');
    }

    public function proposals()
    {
        return view('proposals.index');
    }

    // Redirección para la página de estadísticas según el rol
    public function statisticsRedirect()
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('user.index');
            }
        }
        return redirect()->route('login');
    }
}