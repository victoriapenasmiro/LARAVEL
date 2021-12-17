<?php

namespace Database\Seeders;

use App\Models\Comunidad;
use App\Models\Comunidad_Usuario;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $this->call([
            ComunidadSeeder::class,
            CuentaSeeder::class,
            MovimientoSeeder::class,
            ParteSeeder::class,
            PaisSeeder::class,
        ]);

        //instancia de Faker\Generator para poder generar datos accediendo a las propiedades que queremos obtener
        $faker = Factory::create('es_ES');

        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'mpenas@cifpfbmoll.eu',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'dni' => $faker->dni(),
            'remember_token' => Str::random(10),
        ]);

        $invitado = User::create([
            'name' => 'invitado',
            'email' => 'mpenas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'dni' => $faker->dni(),
            'remember_token' => Str::random(10),
        ]);

        //genero 10 usuarios con Factory
        User::factory(10)->create();

        //completo la tabla de comunidades con el id del administrador, sin factories
        $comunidades = Comunidad::all();
        foreach ($comunidades as $comunidad) {
            $cu = Comunidad_Usuario::create([
                'cmd_id' => $comunidad->id,
                'usuario_id' => $admin->id,
            ]);
        }
    }
}
