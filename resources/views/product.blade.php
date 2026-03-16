@extends('layout.layout')
@section('content')
  @component('components.product-card', [
    'product' => $product
  ])
  @endcomponent
@endsection
