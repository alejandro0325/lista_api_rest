<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\EstudianteFactory;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Estudiante;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() :void

    { 
        Estudiante::Factory()->times(15)->create();
        Curso::Factory()->times(8)->create()->each(function($curso){
            $curso->estudiantes()->sync(
                Estudiante::all()->random()
            );
        });
       
    }
}
