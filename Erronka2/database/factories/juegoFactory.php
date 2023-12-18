<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\juego>
 */
class juegoFactory extends Factory
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

            "tiempo"=>random_int(0,5000),
            "score"=>random_int(0,2000),
            "id_usuario"=>random_int(0,10)
            

        ];
    }
}
