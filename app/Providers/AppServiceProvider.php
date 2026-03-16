<?php

namespace App\Providers;

use App\Models\OrderItem;
use App\Observers\OrderItemObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('components.pagination');
        Paginator::defaultSimpleView('components.pagination');

        // Регистрация Observer для автоматического обновления sales_count
        OrderItem::observe(OrderItemObserver::class);
    }
}
