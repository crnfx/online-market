<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Services\ProductsService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function __construct(
        private readonly ProductsService $productsService,
    )
    {
    }
    
    public function index()
    {
        try {
            $popularProducts = $this->productsService->getPopularProducts(3);
        } catch (Exception $e) {
            Log::error('Popular products error: ' . $e->getMessage());
            $popularProducts = [];
        }

        return view('main', compact('popularProducts'));
    }

    public function getProducts(ProductFilterRequest $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        try {
            $filters = $request->getFilters();
            $products = $this->productsService->getProducts($filters);
        } catch (Exception $e) {
            Log::error('Products errors: ' . $e->getMessage());
            $products = [];
        }

        return view('catalog', compact('products'));
    }

    public function getProductById(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        try {
            $product = $this->productsService->getProductById($id);
        } catch (Exception $e) {
            Log::error('Product errors: ' . $e->getMessage());
            $product = [];
        }

        return view('product', compact('product'));
    }
}
