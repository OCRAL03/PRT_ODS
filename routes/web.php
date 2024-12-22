<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('home');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Encuestas
    Route::get('/survey', [SurveyController::class, 'index']);
    Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
    // Estadísticas (Admin)
    Route::get('/stats', [AdminController::class, 'stats']);
    // Propuestas
    Route::post('/proposals', [ProposalController::class, 'store']);
});