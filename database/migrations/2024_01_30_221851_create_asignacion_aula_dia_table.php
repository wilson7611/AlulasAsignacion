<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignacion_aula_dia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asignacion_aula_id');
            $table->foreign('asignacion_aula_id')->references('id')->on('asignacion_aulas')->onDelete('cascade');
            $table->unsignedBigInteger('dia_id');
            $table->foreign('dia_id')->references('id')->on('dias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_aula_dia');
    }
};
