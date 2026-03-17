@extends('layout.layout')

@section('title', 'Главная')

@section('content')
  <section class="hero">
    @component('components.swiper')
    @endcomponent
  </section>

  <section class="popular">
    <h2>Популярные товары</h2>

    @if($popularProducts->isNotEmpty())
      <div class="products">
        @foreach($popularProducts as $product)
          @component('components.product-card', [
            'product' => $product
           ])
          @endcomponent
        @endforeach
      </div>
    @else
      <p class="empty-message">Пока нет популярных товаров.</p>
    @endif

    <a style="display: inline-block; margin-top: 24px;" href="{{ route('catalog') }}" class="product-card__link">Смотреть
      все товары</a>
  </section>

@endsection
