<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ejemplo 1
        $contactos = [
            ['nombre' => 'Vicky', 'tlf' => '123-123-234'],
            ['nombre' => 'Vicky dos', 'tlf' => '123-123-111'],
        ];

        DB::table('contactos')->insert($contactos);

        //ejemplo 2
        Contacto::factory(2)->create();

        //ejemplo 3
        $principal = Contacto::create([
            'nombre' => 'HolaCaracola',
            'tlf' => '000-144-111',
        ]);
    }
}
