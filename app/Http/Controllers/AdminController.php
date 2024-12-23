<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalStatistic;

class AdminController extends Controller
{
    // Mostrar el panel de administrador
    public function index()
    {
        return view('admin.index');
    }

    // Mostrar estadísticas globales
    public function statistics()
    {
        $globalStats = GlobalStatistic::all();

        $genderStats = $globalStats->filter(fn($stat) => str_contains($stat->statistic_name, 'Porcentaje Género'));
        $ageStat = $globalStats->firstWhere('statistic_name', 'Promedio Edad');
        $fruitsStats = $globalStats->filter(fn($stat) => str_contains($stat->statistic_name, 'Consumo de Frutas'));

        return view('admin.statistics', compact('genderStats', 'ageStat', 'fruitsStats'));
    }
}
