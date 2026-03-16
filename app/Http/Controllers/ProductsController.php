<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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
            $popularProducts = $this->productsService->getPopularProducts(8);
        } catch (Exception $e) {
            Log::error('Popular products error: ' . $e->getMessage());
            $popularProducts = [];
        }

        return view('main', compact('popularProducts'));
    }
    
    public function getProducts(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        try {
            $products = $this->productsService->getProducts();
        } catch (Exception $e) {
            Log::error('Products errors: ' . $e->getMessage());
            $products = [];
        }

        return view('catalog', compact('products'));
    }

    public function getProductById(int $id): JsonResponse
    {
        try {
            $response = $this->responseOk(
                $this->productsService->getProductById($id)
            );
        } catch (Exception $e) {
            $response = $this->responseFail(
                'Product errors: ' . $e->getMessage(),
            );

            Log::error('Product errors: ' . $e->getMessage());
        }

        return $response;
    }
}
