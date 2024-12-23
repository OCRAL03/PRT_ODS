<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Components\{Label, Input, Select};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Registrar los componentes Blade
        \Blade::components([
            'x-select' => Select::class,
            'x-input' => Input::class,
            'x-label' => Label::class,
            // Añadir más si es necesario
        ]);
    }
}
