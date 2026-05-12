<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'is_active',
        'sales_count',
        'views_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sales_count' => 'integer',
        'views_count' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function specifications(): HasMany
    {
        return $this->hasMany(Specification::class)->orderBy('sort_order');
    }

    public function activeSpecifications(): HasMany
    {
        return $this->hasMany(Specification::class)->where('is_active', true)->orderBy('sort_order');
    }

    public function getMinPriceAttribute(): ?float
    {
        $minPrice = $this->activeSpecifications()->min('price');

        return $minPrice !== null ? (float) $minPrice : null;
    }

    public function getMaxPriceAttribute(): ?float
    {
        $maxPrice = $this->activeSpecifications()->max('price');

        return $maxPrice !== null ? (float) $maxPrice : null;
    }

    public function isInStock(): bool
    {
        return $this->activeSpecifications()->where('quantity', '>', 0)->exists();
    }

    public function getSpecificationBySku(string $sku): ?Specification
    {
        return $this->specifications()->where('sku', $sku)->first();
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function mainImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function incrementSales(int $quantity = 1): void
    {
        $this->increment('sales_count', $quantity);
    }
}
