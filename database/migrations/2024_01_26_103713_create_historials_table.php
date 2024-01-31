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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->string('materia')->nullable();
            $table->string('docente')->nullable();
            $table->string('turno')->nullable();
            $table->string('aula')->nullable();
            $table->integer('capacidad')->nullable();
            $table->string('dias')->nullable();
            $table->integer('cantidad_dias')->nullable();
            $table->integer('cantidad_estudiantes')->nullable();
            $table->boolean('confirmado');
            $table->unsignedBigInteger('user_id'); // Ajusta según la relación real con la tabla de usuarios
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
