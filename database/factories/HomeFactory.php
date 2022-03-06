<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Home;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home>
 */

class HomeFactory extends Factory
{

    protected $model = Home::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'sede_id' => $this->faker->randomDigit(),
            'direccion' => $this->faker->text(),
            'motivo_cierre' => $this->faker->sentence(),
            'fecha_inicio' => $this->faker->date()
        ];
    }
}
