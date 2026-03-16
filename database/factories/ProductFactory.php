<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $name = fake()->words(3, true);

        return [
            'category_id' => rand(1, 2),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 100, 10000),
            'sale_price' => null,
            'quantity' => fake()->numberBetween(0, 100),
            'is_active' => fake()->boolean(80),
            'sales_count' => fake()->numberBetween(0, 5),
            'views_count' => fake()->numberBetween(10, 100),
        ];
    }

    /**
     * Активный товар
     */
    public function active(): static
    {
        return $this->state(fn(array $attributes): array => [
            'is_active' => true,
        ]);
    }

    /**
     * Неактивный товар
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes): array => [
            'is_active' => false,
        ]);
    }

    /**
     * Товар со скидкой
     */
    public function onSale(): static
    {
        return $this->state(fn(array $attributes): array => [
            'sale_price' => ($attributes['price'] ?? fake()->randomFloat(2, 100, 10000)) * 0.8,
        ]);
    }

    /**
     * Популярный товар (много продаж)
     */
    public function popular(): static
    {
        return $this->state(fn(array $attributes): array => [
            'sales_count' => fake()->numberBetween(15, 50),
            'views_count' => fake()->numberBetween(500, 2000),
        ]);
    }
}
