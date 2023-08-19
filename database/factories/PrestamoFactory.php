<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     *

     */
    public function definition(): array
    {
        return [
            'fecha_Solicitud' =>fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'fecha_Prestamo' =>fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'fecha_devolucion' =>fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'libro_Id' =>fake()->numberBetween(1, 50),
            'usuario_Id' =>fake()->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
