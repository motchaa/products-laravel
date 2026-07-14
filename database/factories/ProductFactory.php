<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->words(3, true),
            'descricao' => $this->faker->sentence(),
            'codigo' => $this->faker->unique()->ean8(),
            'valor' => $this->faker->randomFloat(2, 10, 500),
            'quantidade' => $this->faker->numberBetween(1, 100),
            'categoria_id' => \App\Models\Category::factory(),
        ];
    }
}
