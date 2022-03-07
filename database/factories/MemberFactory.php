<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        //$faker = $this->faker::create();

        return [

            

            'cedula' => $this->faker->numerify('#########'),
            'nombres' => $this->faker->firstName('male'|'female'),
            'apellidos' => $this->faker->lastName(),
            'fecha_nac'=> $this->faker->date(),
            'edad' => $this->faker->numberBetween(0, 90),
            'direccion' => $this->faker->address(),
            'profesion' => $this->faker->jobTitle(),
            'nacionalidad' => $this->faker->country(),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->email(),

            /*
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,
            '' => $this->faker->,

            */

            


        ];
    }
}
