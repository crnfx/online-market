<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Specification>
 */
class SpecificationFactory extends Factory
{
    protected $model = Specification::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'sku' => strtoupper('SKU-'.Str::random(8)),
            'name' => fake()->word(),
            'attributes' => null,
            'price' => fake()->randomFloat(2, 100, 10000),
            'sale_price' => fake()->randomFloat(2, 50, 5000),
            'quantity' => fake()->numberBetween(0, 100),
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    /**
     * Индексировать спецификацию.
     */
    public function indexed(int $index): static
    {
        return $this->state(fn (array $attributes) => [
            'sort_order' => $index,
        ]);
    }

    /**
     * Неактивная спецификация.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Без скидки.
     */
    public function withoutSale(): static
    {
        return $this->state(fn (array $attributes) => [
            'sale_price' => null,
        ]);
    }

    /**
     * В наличии.
     */
    public function inStock(int $quantity = 10): static
    {
        return $this->state(fn (array $attributes) => [
            'quantity' => $quantity,
        ]);
    }

    /**
     * Нет в наличии.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'quantity' => 0,
        ]);
    }

    /**
     * С атрибутами (размер, цвет и т.д.).
     */
    public function withAttributes(array $attributes): static
    {
        return $this->state(fn (array $attributes) => [
            'attributes' => $attributes,
        ]);
    }
}
