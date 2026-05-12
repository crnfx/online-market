<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProductsService
{
    const PER_PAGE = 20;

    public function getProducts(array $filters = [], int $perPage = self::PER_PAGE): LengthAwarePaginator
    {
        $query = Product::query()
            ->with(['images', 'activeSpecifications'])
            ->where('is_active', true)
            ->whereHas('specifications', function ($q) {
                $q->where('is_active', true);
            });

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        if (!empty($filters['price_min'])) {
            $query->whereHas('specifications', function ($q) use ($filters) {
                $q->where('price', '>=', $filters['price_min'])
                    ->where('is_active', true);
            });
        }
        if (!empty($filters['price_max'])) {
            $query->whereHas('specifications', function ($q) use ($filters) {
                $q->where('price', '<=', $filters['price_max'])
                    ->where('is_active', true);
            });
        }

        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        $sortField = $filters['sort'] ?? 'created_at';
        $sortOrder = $filters['order'] ?? 'desc';

        switch ($sortField) {
            case 'price':
                $query->join('specifications', 'products.id', '=', 'specifications.product_id')
                    ->select('products.*', DB::raw('MIN(specifications.price) as min_price'))
                    ->groupBy('products.id')
                    ->orderBy('min_price', $sortOrder);
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

        return $query->paginate($perPage);
    }

    public function getPopularProducts(int $limit): Collection
    {
        return Product::query()
            ->with(['images', 'activeSpecifications'])
            ->where('is_active', true)
            ->whereHas('specifications', function ($q) {
                $q->where('is_active', true);
            })
            ->orderByDesc('sales_count')
            ->orderByDesc('views_count')
            ->take($limit)
            ->get();
    }

    public function getProductById(int $id): Product
    {
        $product = Product::query()
            ->with(['images', 'activeSpecifications'])
            ->findOrFail($id);
        $product->incrementViews();

        return $product;
    }

    public function getSpecificationBySku(string $sku): ?Specification
    {
        return Specification::query()
            ->where('sku', $sku)
            ->where('is_active', true)
            ->first();
    }
}
