<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'name' => fake()->word(),
            'short_description'   => fake()->sentence(),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(1, 1000),
            'thumbnail' => fake()->image(public_path('storage/images'), 640, 640, 'products', false, true, null, true)
        ];
    }
}
