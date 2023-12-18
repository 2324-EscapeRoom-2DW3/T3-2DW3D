<?php

namespace Database\Seeders;

use App\Models\Prueba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $prueba = new Prueba();
        $prueba-> tiempoPartida = 1200;
        $prueba-> scorePartida = 1200;
        $prueba-> id_juego = 1;
        $prueba-> save();

        $prueba = new Prueba();
        $prueba-> tiempoPartida = 1600;
        $prueba-> scorePartida = 1600;
        $prueba-> id_juego = 2;
        $prueba-> save();

        $prueba = new Prueba();
        $prueba-> tiempoPartida = 1900;
        $prueba-> scorePartida = 1900;
        $prueba-> id_juego = 3;
        $prueba-> save();

    }
}
