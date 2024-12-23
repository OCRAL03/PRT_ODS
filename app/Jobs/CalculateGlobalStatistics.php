<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateGlobalStatistics implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Promedio de edad
        $averageAge = \DB::table('surveys')->avg('age');

        // Porcentaje de género
        $genderStats = \DB::table('surveys')
            ->select('gender', \DB::raw('COUNT(*) * 100 / (SELECT COUNT(*) FROM surveys) AS percentage'))
            ->groupBy('gender')
            ->get();

        // Frecuencia de consumo de frutas y verduras
        $fruitsStats = \DB::table('surveys')
            ->select('fruits_vegetables', \DB::raw('COUNT(*) AS count'))
            ->groupBy('fruits_vegetables')
            ->get();

        // Guardar estadísticas globales
        \App\Models\GlobalStatistic::updateOrCreate(
            ['statistic_name' => 'Promedio Edad'],
            ['statistic_value' => $averageAge]
        );

        foreach ($genderStats as $stat) {
            \App\Models\GlobalStatistic::updateOrCreate(
                ['statistic_name' => 'Porcentaje Género: ' . $stat->gender],
                ['statistic_value' => $stat->percentage]
            );
        }

        foreach ($fruitsStats as $stat) {
            \App\Models\GlobalStatistic::updateOrCreate(
                ['statistic_name' => 'Consumo de Frutas: ' . $stat->fruits_vegetables],
                ['statistic_value' => $stat->count]
            );
        }
    }

}
