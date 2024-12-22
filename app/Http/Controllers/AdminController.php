<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stats()
    {
    $averageWater = Survey::avg('water_glasses');
    $averageActivity = Survey::avg('physical_activity');
    $averageSleep = Survey::avg('sleep_hours');

    return view('stats.user', compact('averageWater', 'averageActivity', 'averageSleep'));
    }
}