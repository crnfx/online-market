<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsService
{
    public function getProducts(int $perPage = 10): LengthAwarePaginator
    {
        return Product::query()
            ->where('is_active', true)
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function getPopularProducts(int $limit = 8): \Illuminate\Database\Eloquent\Collection
    {
        return Product::query()
            ->where('is_active', true)
            ->orderByDesc('sales_count')
            ->orderByDesc('views_count')
            ->take($limit)
            ->get();
    }

    public function getProductById(int $id): Product
    {
        $product = Product::query()->findOrFail($id);
        $product->incrementViews();

        return $product;
    }
}


