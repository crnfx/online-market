<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexCartRequest;
use App\Http\Requests\RemoveCartItemRequest;
use App\Http\Requests\StoreItemCartRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Specification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function store(StoreItemCartRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $productId = $validated['product_id'];
            $specificationId = $validated['specification_id'];
            $quantity = $validated['quantity'];

            $specification = Specification::findOrFail($specificationId);

            if (! $specification->is_active) {
                return $this->responseFail('Данный вариант товара недоступен', 400);
            }

            if ($specification->quantity < $quantity) {
                return $this->responseFail('Недостаточно товара на складе. Доступно: '.$specification->quantity, 400);
            }

            $cart = $this->getOrCreateCart($request);

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->where('specification_id', $specificationId)
                ->first();

            DB::beginTransaction();

            if ($cartItem) {
                $newQuantity = $cartItem->quantity + $quantity;

                if ($specification->quantity < $newQuantity) {
                    DB::rollBack();

                    return $this->responseFail('Недостаточно товара на складе. Доступно: '.$specification->quantity, 400);
                }

                $cartItem->quantity = $newQuantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'specification_id' => $specificationId,
                    'quantity' => $quantity,
                    'price' => $specification->sale_price ?? $specification->price,
                ]);
            }

            $cart->load('items');
            $cart->recalculateTotal();

            DB::commit();

            return $this->responseOk([
                'items_count' => $cart->items->sum('quantity'),
                'total' => (float) $cart->total,
            ], 'Товар добавлен в корзину');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Cart add error: '.$e->getMessage());

            return $this->responseFail('Ошибка добавления товара в корзину', 500);
        }
    }

    public function update(UpdateCartItemRequest $request, int $itemId): JsonResponse
    {
        try {
            $validated = $request->validated();

            $cartItem = CartItem::findOrFail($itemId);
            $specification = $cartItem->specification;

            if ($specification->quantity < $validated['quantity']) {
                return $this->responseFail('Недостаточно товара на складе', 400);
            }

            $cartItem->quantity = $validated['quantity'];
            $cartItem->save();

            $cartItem->cart->recalculateTotal();

            return $this->responseOk([], 'Количество обновлено');

        } catch (\Exception $e) {
            Log::error('Cart update error: '.$e->getMessage());

            return $this->responseFail('Ошибка обновления корзины', 500);
        }
    }

    public function remove(RemoveCartItemRequest $request, int $itemId): JsonResponse
    {
        try {
            $cartItem = CartItem::findOrFail($itemId);
            $cart = $cartItem->cart;

            $cartItem->delete();
            $cart->recalculateTotal();

            return $this->responseOk([], 'Товар удалён из корзины');

        } catch (\Exception $e) {
            Log::error('Cart remove error: '.$e->getMessage());

            return $this->responseFail('Ошибка удаления товара из корзины', 500);
        }
    }

    public function index(IndexCartRequest $request): JsonResponse
    {
        try {
            $cart = $this->getOrCreateCart($request);
            $cart->load(['items.product', 'items.specification']);

            return $this->responseOk([
                'id' => $cart->id,
                'items' => $cart->items->map(fn ($item) => [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'specification_id' => $item->specification_id,
                    'sku' => $item->specification?->sku,
                    'variant_name' => $item->specification?->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->total,
                ]),
                'items_count' => $cart->items->sum('quantity'),
                'total' => $cart->total,
            ]);

        } catch (\Exception $e) {
            Log::error('Cart get error: '.$e->getMessage());

            return $this->responseFail('Ошибка получения корзины', 500);
        }
    }

    private function getOrCreateCart(Request $request): Cart
    {
        $sessionId = $request->session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();

        if (! $cart) {
            $cart = Cart::create([
                'session_id' => $sessionId,
                'total' => 0,
            ]);
        }

        return $cart;
    }
}
