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

    // Redirección para la página de estadísticas según el rol
    public function statisticsRedirect()
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.statistics');
            } else {
                return redirect()->route('user.index');
            }
        }
        return redirect()->route('login', ['redirect' => 'statistics']);
    }
}