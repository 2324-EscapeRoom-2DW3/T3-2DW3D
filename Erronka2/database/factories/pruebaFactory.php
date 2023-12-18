<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prueba>
 */
class pruebaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            "tiempoPartida"=>random_int(0,5000),
            "scorePartida"=>random_int(0,2000),
            "id_juego"=>random_int(0,10)

        ];
    }
}
