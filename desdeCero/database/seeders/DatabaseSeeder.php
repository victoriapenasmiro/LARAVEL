<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        //opción manual
        $curso = new Curso();
        $curso->name = 'Laravel';
        $curso->description = 'Curso Laravel desde cero';
        $curso->categoria = 'DAW';

        $curso->save();

        //opción con factory - Crea 50 elementos ficticios
        Curso::factory(50)->create();

    }
}
