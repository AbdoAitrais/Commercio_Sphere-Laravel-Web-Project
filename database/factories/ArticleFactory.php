<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->numberBetween(1000, 9999),
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'prix' => $this->faker->numberBetween(100, 999),
            'quantite' => $this->faker->numberBetween(1, 99),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
