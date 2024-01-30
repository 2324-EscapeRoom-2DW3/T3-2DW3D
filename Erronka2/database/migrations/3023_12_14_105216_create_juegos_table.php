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
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tiempo_parts');
            $table->bigInteger('score');
            $table->bigInteger('llave');
            $table->bigInteger('tutorial');
            $table->bigInteger('tiempo_min');
            $table->bigInteger('tiempo_sec');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
