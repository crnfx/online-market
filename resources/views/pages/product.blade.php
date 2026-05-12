@extends('layout.layout')

@section('title', $product->name ?? 'Товар')

@section('content')

  <section class="product-page">
    @if($product)
      <div class="product-page__container">
        <div class="product-page__gallery">
          @component('components.product-image', ['product' => $product])
          @endcomponent
        </div>

        <div class="product-page__info">
          <div class="product-page__header">
            <span class="product-page__category">
              {{ $product->category ? $product->category->name : 'Каталог' }}
            </span>
            <h1 class="product-page__title">{{ $product->name }}</h1>
          </div>

          <p class="product-page__description">{{ $product->description }}</p>

          @if($product->activeSpecifications && $product->activeSpecifications->count() > 0)
            <div class="product-page__selector">
              @component('components.specification-selector', [
                'specifications' => $product->activeSpecifications,
                'productName' => $product->name
              ])
              @endcomponent
            </div>
          @else
            <p class="product-page__no-specs">Нет доступных вариантов товара</p>
          @endif

          @if($product->activeSpecifications && $product->activeSpecifications->first()?->attributes)
            <div class="product-page__specs">
              <h3 class="product-page__specs-title">Характеристики</h3>
              <ul class="product-page__specs-list">
                @foreach($product->activeSpecifications->first()->attributes as $key => $value)
                  <li class="product-page__specs-item">
                    <span class="product-page__specs-key">{{ ucfirst($key) }}:</span>
                    <span class="product-page__specs-value">{{ $value }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
      </div>
    @else
      <div class="product-page__empty">
        <h2>Товар не найден</h2>
        <p>К сожалению, запрашиваемый товар не существует или удалён.</p>
        <a href="{{ route('catalog') }}" class="product-page__back-link">← Вернуться в каталог</a>
      </div>
    @endif
  </section>
@endsection
