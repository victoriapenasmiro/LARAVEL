<?php

namespace Database\Factories;

use App\Models\Comunidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comunidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cif' => $this->faker->unique()->vat(),
            'activa' => $this->faker->boolean(),
            'partes' => $this->faker->numerify('###'), //all # characters are replaced by digits between 0 and 10
            'presidente' => $this->faker->firstName() . " " . $this->faker->lastName(),
        ];
    }
}
