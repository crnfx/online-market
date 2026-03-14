<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создать 20 товаров
        Product::factory()
            ->count(20)
            ->create();

        // Создать 5 товаров со скидкой
        Product::factory()
            ->count(5)
            ->onSale()
            ->create();

        // Создать 3 неактивных товара
        Product::factory()
            ->count(3)
            ->inactive()
            ->create();
    }
}
