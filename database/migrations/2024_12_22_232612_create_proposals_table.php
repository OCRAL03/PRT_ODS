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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id(); // ID único.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users.
            $table->text('proposal_text'); // Texto de la propuesta.
            $table->timestamps(); // created_at y updated_at.
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
