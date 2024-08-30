<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>$this->faker->firstName(),
            'postnom' => $this->faker->lastName(),

            'prenom' => $this->faker->lastName(),
            'date_naiss' => $this->faker->date(),
            'sexe'
            => $this->faker->randomElement(['M','F']),
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'etat_civil' => $this->faker->randomElement(['divorced','single','marier']),
            //
        ];
    }
}
