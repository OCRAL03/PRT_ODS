<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Jobs\CalculateUserStatistics;

class SurveyController extends Controller
{
    // Guardar respuestas de la encuesta
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'gender' => 'required|string',
            'occupation' => 'required|string',
            'meals_per_day' => 'required|integer',
            'fruits_vegetables' => 'required|string',
            'high_fats_sugars' => 'required|string',
            'water_intake' => 'required|string',
            'physical_activity' => 'required|string',
            'sleep_hours' => 'required|integer',
            'quality_of_sleep' => 'required|string',
        ]);

        $survey = Survey::create([
            'user_id' => auth()->id(),
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
            'occupation' => $request->occupation,
            'meals_per_day' => $request->meals_per_day,
            'fruits_vegetables' => $request->fruits_vegetables,
            'high_fats_sugars' => $request->high_fats_sugars,
            'water_intake' => $request->water_intake,
            'physical_activity' => $request->physical_activity,
            'sleep_hours' => $request->sleep_hours,
            'quality_of_sleep' => $request->quality_of_sleep,
        ]);

        // Calcula estadísticas personalizadas del usuario
        CalculateUserStatistics::dispatch(auth()->user());

        return redirect()->route('user.index')->with('success', 'Encuesta enviada con éxito.');
    }
}