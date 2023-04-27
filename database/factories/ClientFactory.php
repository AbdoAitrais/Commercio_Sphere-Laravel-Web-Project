<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'IF' => $this->faker->bankAccountNumber  ,
            'ICE' => $this->faker->bankAccountNumber,
            'email' => $this->faker->email(),
            'telephone' => $this->faker->phoneNumber(),
            'adresse' => $this->faker->address(),
            'code_postal' => $this->faker->postcode(),
            'ville' => $this->faker->city(),
            'pays' => $this->faker->country(),
        ];
    }
}
