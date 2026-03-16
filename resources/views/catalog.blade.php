@extends('layout.layout')

@section('title', 'Каталог')

@section('content')
  <section class="catalog">
    <h1>Каталог товаров</h1>

    <div class="products-grid">
      @forelse($products as $product)
        <article class="product-card">
          @if($product->sales_count > 10)
            <span class="product-card__badge">Хит продаж</span>
          @endif

          <h3 class="product-card__title">{{ $product->name }}</h3>

          <p class="product-card__description">
            {{ Str::limit($product->description, 100) }}
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

          <a class="product-card__link" href="{{ route('product', $product->id) }}">
            Подробнее
          </a>
        </article>
      @empty
        <p class="empty-message">Товары пока не добавлены.</p>
      @endforelse
    </div>

    @if(method_exists($products, 'links'))
      <div class="pagination">
        {{ $products->links() }}
      </div>
    @endif
  </section>
@endsection
