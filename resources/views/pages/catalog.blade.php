@extends('layout.layout')

@section('title', 'Каталог')

@section('content')
  <section class="catalog">
    <h1>Каталог товаров</h1>
    <div class="catalog__wrapper">
      @component('components.filter-products-form')
      @endcomponent

      <div class="products">
        @forelse($products as $product)
          @component('components.product-card', [
            'product' => $product
           ])
          @endcomponent
        @empty
          <p class="empty-message">Товары не найдены.</p>
        @endforelse
      </div>
    </div>
    @if(method_exists($products, 'links'))
      <div class="pagination">
        {{ $products->links() }}
      </div>
    @endif
  </section>
@endsection
