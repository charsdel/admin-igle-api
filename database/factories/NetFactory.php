<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Net;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Net>
 */
class NetFactory extends Factory
{
    protected $model = Net::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'codigo_red' => $this->faker->swiftBicNumber(),
            'zona_geografica' => $this->faker->sentence(),
            'fecha_inicio' => $this->faker->date()

        ];
    }
}
