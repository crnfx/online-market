<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
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
     * Товар с одной спецификацией
     */
    public function withSpecification(array $specAttributes = []): static
    {
        return $this->afterCreating(function (Product $product) use ($specAttributes) {
            Specification::factory()->create(array_merge([
                'product_id' => $product->id,
            ], $specAttributes));
        });
    }

    /**
     * Товар с несколькими спецификациями (вариантами)
     */
    public function withSpecifications(int $count = 3): static
    {
        return $this->afterCreating(function (Product $product) use ($count) {
            Specification::factory()->count($count)->create(['product_id' => $product->id]);
        });
    }

    /**
     * Товар со скидкой (скидка применяется к спецификациям)
     */
    public function onSale(): static
    {
        return $this->afterCreating(function (Product $product) {
            $product->specifications()->update([
                'sale_price' => DB::raw('price * 0.8'),
            ]);
        });
    }

    /**
     * Популярный товар
     */
    public function popular(): static
    {
        return $this->state(fn(array $attributes): array => [
            'sales_count' => fake()->numberBetween(15, 50),
            'views_count' => fake()->numberBetween(500, 2000),
        ]);
    }
}
