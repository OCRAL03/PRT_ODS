<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    // Mostrar la página de invitación a llenar encuestas
    public function index()
    {
        return view('survey.index');
    }

    // Mostrar el formulario de la encuesta (requiere autenticación)
    public function formulario()
    {
        return view('survey.formulario');
    }

    // Almacenar las respuestas de la encuesta
    public function store(Request $request)
    {
        // Validar y guardar las respuestas de la encuesta
        $request->validate([
            'question1' => 'required',
            'question2' => 'required',
            // Añadir más validaciones según sea necesario
        ]);

        // Lógica para almacenar las respuestas en la base de datos

        return redirect()->route('survey.index')->with('success', 'Encuesta completada con éxito.');
    }
}