<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article' => $this->faker->unique()->regexify('[a-zA-Z0-9]{10}'),
            'name' => $this->faker->words(4, true),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'data' => [
                'Color' => $this->faker->colorName,
                'Size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            ],
        ];
    }
}
