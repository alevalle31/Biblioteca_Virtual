<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre'=>fake()->name(),
            'correo_electronico'=>fake()->email(),
            'telefono'=>fake()->phoneNumber(),
            'direcion_usuario'=>fake()->address(),
        ];
    }
}
