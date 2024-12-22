<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'gender' => 'required|string',
            'occupation' => 'required|string',
            'meals_per_day' => 'required|integer',
            'fruits_vegetables' => 'required|string',
            'high_fat_sugar' => 'required|string',
            'water_intake' => 'required|string',
            'exercise_frequency' => 'required|string',
            'exercise_time' => 'required|string',
            'sleep_hours' => 'required|string',
            'sleep_quality' => 'required|string',
            'important_factors' => 'required|string',
            'health_recommendations' => 'required|string',
        ]);

        $survey = new Survey($validated);
        $survey->user_id = auth()->id();
        $survey->save();

        // Calcular IMC
        $bmi = $validated['weight'] / pow($validated['height'] / 100, 2);

        return redirect('/survey')->with('status', 'Encuesta guardada! IMC: ' . number_format($bmi, 2));
    }
}