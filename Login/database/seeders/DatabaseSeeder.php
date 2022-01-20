<?php

namespace Database\Seeders;

use App\Models\Contacto;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        //ver en seeder 3 formas de carga
        $this->call([
            ContactoSeeder::class,
        ]);

        //conviene crear un usuario por defecto
        //para que al hacer fresh se regenere cada vez

    }
}
