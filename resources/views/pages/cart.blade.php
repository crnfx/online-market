@extends('layout.layout')

@section('title', 'Корзина')

@section('content')
  <section class="cart-page">
    <h1 class="cart-page__title">Корзина товаров</h1>

    <div id="cart-container">
      <div class="cart-loading">Загрузка корзины...</div>
    </div>
  </section>
@endsection
