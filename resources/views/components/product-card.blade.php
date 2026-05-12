@props([
  'product' => null,
  'isSingle' => false
])

@if($product)
  <article class="product product__card product-card {{ $isSingle ? 'product-card--single' : '' }}">
    @if($product->sales_count > 10)
      <span class="product-card__badge">Хит продаж</span>
    @endif

    <h3 class="product-card__title">{{ $product->name }}</h3>

    <div class="product-card__content">
      <div class="product-card__image">
        @component('components.product-image', ['product' => $product])
        @endcomponent
      </div>

      <div class="product-card__info">
        <p class="product-card__description">{{ $product->description }}</p>

        <div class="product-card__prices">
          @php
            $minPrice = $product->min_price;
            $maxPrice = $product->max_price;
            $hasPriceRange = $minPrice !== null && $maxPrice !== null && $minPrice != $maxPrice;
            $firstSpec = $product->activeSpecifications->first();
            $hasSale = $firstSpec && $firstSpec->sale_price !== null;
          @endphp

          @if($hasPriceRange)
            <p class="product-card__price">
              от {{ number_format((float) $minPrice, 0, '.', ' ') }} ₽
              @if($maxPrice > $minPrice)
                <span class="product-card__price-range">до {{ number_format((float) $maxPrice, 0, '.', ' ') }} ₽</span>
              @endif
            </p>
          @elseif($firstSpec)
            @if($firstSpec->sale_price !== null)
              <p class="product-card__price product-card__price--old">
                {{ number_format((float) $firstSpec->price, 0, '.', ' ') }} ₽
              </p>
              <p class="product-card__sale-price">
                {{ number_format((float) $firstSpec->sale_price, 0, '.', ' ') }} ₽
              </p>
            @else
              <p class="product-card__price">
                {{ number_format((float) $firstSpec->price, 0, '.', ' ') }} ₽
              </p>
            @endif
          @endif
        </div>

        <p class="product-card__quantity">
          @if($product->isInStock())
            <span class="in-stock">В наличии</span>
          @else
            <span class="out-of-stock">Нет в наличии</span>
          @endif
        </p>
      </div>
    </div>

    @if(!$isSingle)
      <a class="product-card__link" href="{{ route('product', $product->id) }}">Подробнее</a>
    @endif
  </article>
@endif

