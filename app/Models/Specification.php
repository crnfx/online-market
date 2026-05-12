<?php

namespace App\Models;

use Database\Factories\SpecificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Specification extends Model
{
    /** @use HasFactory<SpecificationFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'name',
        'attributes',
        'price',
        'sale_price',
        'quantity',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'attributes' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeBySku($query, string $sku)
    {
        return $query->where('sku', $sku);
    }

    public function getFinalPriceAttribute(): float
    {
        return $this->sale_price ?? $this->price;
    }

    public function isInStock(): bool
    {
        return $this->quantity > 0;
    }

    public function getAttributeData(?string $key = null): mixed
    {
        $attributes = $this->attributes ?? [];

        if ($key === null) {
            return $attributes;
        }

        return $attributes[$key] ?? null;
    }
}
