<?php

namespace Database\Seeders;

use App\Models\Juego;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class juegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $juego = new Juego();
        $juego-> tiempo = 1200;
        $juego-> score = 900;
        $juego-> id_usuario = 1;
        $juego-> save();

        $juego = new Juego();
        $juego-> tiempo = 1400;
        $juego-> score = 600;
        $juego-> id_usuario = 2;
        $juego-> save();

        $juego = new Juego();
        $juego-> tiempo = 2000;
        $juego-> score = 400;
        $juego-> id_usuario = 3;
        $juego-> save();
    }
}
