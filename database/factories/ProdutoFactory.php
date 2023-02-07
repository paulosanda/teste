<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo' => fake()->numberBetween(0, 10000),
            'nome' => fake()->text(10),
            'descricao' => fake()->text(50),
            'valor' => fake()->numberBetween(10, 1000),
        ];
    }
}
