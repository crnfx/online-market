@props([
  'product' => []
])

<article class="product__card product-card">
  @if($product->sales_count > 10)
    <span class="product-card__badge">Хит продаж</span>
  @endif

  <h3 class="product-card__title">{{ $product->name }}</h3>

  <p class="product-card__description">
    {{ $product->description }}
  </p>

  <div class="product-card__prices">
    @if(!is_null($product->sale_price))
      <p class="product-card__price product-card__price--old">
        {{ number_format((float) $product->price, 0, '.', ' ') }} ₽
      </p>
      <p class="product-card__sale-price">
        {{ number_format((float) $product->sale_price, 0, '.', ' ') }} ₽
      </p>
    @else
      <p class="product-card__price">
        {{ number_format((float) $product->price, 0, '.', ' ') }} ₽
      </p>
    @endif
  </div>

  <p class="product-card__quantity">
    @if($product->quantity > 0)
      В наличии: {{ $product->quantity }}
    @else
      <span class="out-of-stock">Нет в наличии</span>
    @endif
  </p>
  @if(request()->routeIs('catalog'))
    <a class="product-card__link" href="{{ route('product', $product->id) }}">Подробнее</a>
  @endif
</article>
