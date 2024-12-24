<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Página para invitar a llenar encuestas
Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');

// Rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    // Formulario de encuestas
    Route::get('/survey/formulario', [SurveyController::class, 'formulario'])->name('survey.formulario');
    Route::post('/survey/formulario', [SurveyController::class, 'store'])->name('survey.store');

    // Página de propuestas
    Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals.index');
    Route::get('/proposals/create', [ProposalController::class, 'create'])->name('proposals.create');
    Route::get('/proposals/my', [ProposalController::class, 'myProposals'])->name('proposals.my');
    Route::post('/proposals', [ProposalController::class, 'store'])->name('proposals.store');

    // Redirección para la página de estadísticas según el rol
    Route::get('/statistics', [HomeController::class, 'statisticsRedirect'])->name('statistics.redirect');

    // Panel de usuario
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile', [UserController::class, 'update'])->name('user.update');
    Route::delete('/profile', [UserController::class, 'deleteAccount'])->name('user.delete');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});

// Rutas para administradores autenticados
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Estadísticas globales
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');

    // Gestión de menús
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
});