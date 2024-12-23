<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id(); // ID único.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users.
            $table->integer('age'); // Edad del usuario.
            $table->decimal('height', 5, 2); // Altura (en cm).
            $table->decimal('weight', 5, 2); // Peso (en kg).
            $table->enum('gender', ['Masculino', 'Femenino', 'Prefiero no decirlo']);
            $table->string('occupation'); // Ocupación.
            $table->integer('meals_per_day'); // Número de comidas al día.
            $table->enum('fruits_vegetables', ['Sí', 'No', 'A veces']);
            $table->enum('high_fats_sugars', ['Diariamente', 'Varias veces a la semana', 'Ocasionalmente', 'Nunca']);
            $table->enum('water_intake', ['Menos de 4', 'Entre 4 y 8', 'Más de 8']);
            $table->enum('physical_activity', ['Sí', 'No', 'A veces']);
            $table->string('physical_activity_time')->nullable(); // Tiempo dedicado a actividad física.
            $table->integer('sleep_hours'); // Horas de sueño.
            $table->enum('quality_of_sleep', ['Sí', 'No', 'A veces']);
            $table->json('preferences')->nullable(); // Preferencias de comida.
            $table->json('recommendations')->nullable(); // Recomendaciones generadas.
            $table->timestamps(); // created_at y updated_at.
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
