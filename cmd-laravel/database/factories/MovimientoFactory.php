<?php

namespace Database\Factories;

use App\Models\Cuenta;
use App\Models\Movimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'importe' => $this->faker->randomFloat(2),
            'concepto' => $this->faker->sentence(),
            'cuenta_destino' => $this->faker->bankAccountNumber(),//->bothify('??################') --> Generate a string where ? characters are replaced with a random letter, and # characters are replaces with a random digit between 0 and 10
            'cuenta' => $this->faker->numberBetween(1,Cuenta::count()),
        ];
    }
}
