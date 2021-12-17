<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partes = [
            ['name' => 'PARTE1', 'codigo' => 'PATR', 'cmd_id' => 1],
            ['name' => 'PARTE2', 'codigo' => 'ABCD', 'cmd_id' => 2],
            ['name' => 'PARTE3', 'codigo' => 'PTEE', 'cmd_id' => 3],
            ['name' => 'PARTE4', 'codigo' => 'PTEE', 'cmd_id' => 4],
            ['name' => 'PARTE5', 'codigo' => 'PTEE', 'cmd_id' => 5],
            ['name' => 'PARTE6', 'codigo' => 'ABCD', 'cmd_id' => 6],
            ['name' => 'PARTE7', 'codigo' => 'ABCD', 'cmd_id' => 7],
            ['name' => 'PARTE8', 'codigo' => 'PATR', 'cmd_id' => 8],
        ];

        DB::table('partes')->insert($partes);
    }
}
