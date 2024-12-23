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
        Schema::create('global_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('statistic_name'); // Ej. "Promedio Edad", "Porcentaje Hombres".
            $table->string('statistic_value'); // Valor de la estadística.
            $table->timestamps(); // created_at y updated_at.
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_statistics');
    }
};
