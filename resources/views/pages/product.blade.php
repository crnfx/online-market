@extends('layout.layout')

@section('title', $product->name ?? 'Товар')

@section('content')
  @if($product)
    @component('components.product-card', [
      'product' => $product
    ])
    @endcomponent
  @else
    <p class="empty-message">Товар не найден.</p>
  @endif
@endsection
