<?php

namespace Database\Factories;

use App\Models\Comunidad;
use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuentaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cuenta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'iban' => $this->faker->bankAccountNumber(),
            'banco' => $this->faker->randomElement(['BBVA', 'ING', 'EVO']),
            'fecha_apertura' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'cmd_id' => $this->faker->numberBetween(1,Comunidad::count()),
        ];
    }
}
