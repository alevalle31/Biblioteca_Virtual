<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Usuario;
use App\Models\Prestamo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LibrosSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(PrestamosSeeder::class);
    }
}
