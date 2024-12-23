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
    Schema::create('user_statistics', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con usuarios.
        $table->decimal('bmi', 5, 2); // IMC (Índice de Masa Corporal).
        $table->decimal('average_sleep_hours', 4, 2); // Promedio de horas de sueño.
        $table->string('physical_activity_level'); // Nivel de actividad física (baja, moderada, alta).
        $table->decimal('average_water_intake', 4, 2); // Promedio de vasos de agua diarios.
        $table->timestamps(); // created_at y updated_at.
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statistics');
    }
};
