<?php

namespace App\Observers;

use App\Models\OrderItem;

class OrderItemObserver
{
    public function created(OrderItem $orderItem): void
    {
        $orderItem->product?->incrementSales($orderItem->quantity);
    }

    public function deleted(OrderItem $orderItem): void
    {
        $orderItem->product?->decrement('sales_count', $orderItem->quantity);
    }
}
