<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumno::make()->create([
            'nombre' => 'Juan',
            'correo' => 'xd@gmail.com',
            'fecha_nacimiento' => '1990-01-01',
            'ciudad' => 'Madrid',
        ]);
    }
}
