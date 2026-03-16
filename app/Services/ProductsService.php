<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsService
{
    const PER_PAGE = 15;

    public function getProducts(array $filters = [], int $perPage = self::PER_PAGE): LengthAwarePaginator
    {
        $query = Product::query()->where('is_active', true);

        if (! empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        if (! empty($filters['price_min'])) {
            $query->where('price', '>=', $filters['price_min']);
        }
        if (! empty($filters['price_max'])) {
            $query->where('price', '<=', $filters['price_max']);
        }

        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }

        $sortField = $filters['sort'] ?? 'created_at';
        $sortOrder = $filters['order'] ?? 'desc';

        switch ($sortField) {
            case 'price':
                $query->orderBy('price', $sortOrder);
                break;
            case 'popularity':
                $query->orderByDesc('sales_count')->orderByDesc('views_count');
                break;
            case 'name':
                $query->orderBy('name', $sortOrder);
                break;
            default:
                $query->orderBy('created_at', $sortOrder);
        }

        return $query->paginate(self::PER_PAGE ?? $perPage);
    }

    public function getPopularProducts(int $limit): Collection
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
