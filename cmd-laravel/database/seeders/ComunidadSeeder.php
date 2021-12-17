<?php

namespace Database\Seeders;

use App\Models\Comunidad;
use Illuminate\Database\Seeder;

class ComunidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad::factory(50)->create();
    }
}
