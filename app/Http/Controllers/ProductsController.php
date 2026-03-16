<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Services\ProductsService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function __construct(
        private readonly ProductsService $productsService,
    ) {}

    public function index()
    {
        try {
            $popularProducts = $this->productsService->getPopularProducts(3);
        } catch (Exception $e) {
            Log::error('Popular products error: '.$e->getMessage());
            $popularProducts = collect();
        }

        return view('pages.main', compact('popularProducts'));
    }

    public function getProducts(ProductFilterRequest $request): Factory|\Illuminate\Contracts\View\View|View
    {
        try {
            $filters = $request->getFilters();
            $products = $this->productsService->getProducts($filters);
        } catch (Exception $e) {
            Log::error('Products errors: '.$e->getMessage());
            $products = collect();
        }

        return view('pages.catalog', compact('products'));
    }

    public function getProductById(int $id): Factory|\Illuminate\Contracts\View\View|View
    {
        try {
            $product = $this->productsService->getProductById($id);
        } catch (Exception $e) {
            Log::error('Product errors: '.$e->getMessage());
            $product = null;
        }

        return view('pages.product', compact('product'));
    }
}
