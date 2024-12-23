<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateUserStatistics implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $user)
    {
    }

    public function handle()
    {
        // Encuestas del usuario
        $surveys = $this->user->surveys;

        // Cálculo de IMC
        $bmi = $surveys->last()->weight / (($surveys->last()->height / 100) ** 2);

        // Promedio de horas de sueño
        $averageSleepHours = $surveys->avg('sleep_hours');

        // Nivel de actividad física
        $physicalActivityLevel = match ($surveys->last()->physical_activity) {
            'No' => 'Baja',
            'A veces' => 'Moderada',
            'Sí' => 'Alta',
        };

        // Promedio de hidratación diaria
        $waterIntakeValues = $surveys->pluck('water_intake')->map(function ($value) {
            return match ($value) {
                'Menos de 4' => 3,
                'Entre 4 y 8' => 6,
                'Más de 8' => 9,
            };
        });
        $averageWaterIntake = $waterIntakeValues->avg();

        // Guardar en la tabla user_statistics
        \App\Models\UserStatistic::updateOrCreate(
            ['user_id' => $this->user->id],
            [
                'bmi' => $bmi,
                'average_sleep_hours' => $averageSleepHours,
                'physical_activity_level' => $physicalActivityLevel,
                'average_water_intake' => $averageWaterIntake,
            ]
        );
    }

}
