<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo'=>fake()->word(),
            'autor'=>fake()->firstName(),
            'editorial'=>fake()->word(),
            'anio'=>fake()->numberBetween(1971, 2022),
            'cantidad_disponoble'=>fake()->numberBetween(0,20),

        ];
    }
}
