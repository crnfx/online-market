@props([
    'product' => null,
])

<div class="product__image">
  @if($product && $product->images->count() > 0)
    <ul class="image-switch">
      @foreach($product->images as $image)
        <li class="image-switch__item">
          <div class="image-switch__img">
            <img src="{{ Storage::url($image->path) }}" alt="{{ $image->alt ?? $product->name }}">
          </div>
        </li>
      @endforeach
    </ul>
    <ul class="product__image-pagination image-pagination" aria-hidden="true"></ul>
  @else
    <ul class="image-switch">
      <li class="image-switch__item">
        <div class="image-switch__img">
          <img src="{{ asset('images/placeholder.webp') }}" alt="Нет изображения">
        </div>
      </li>
    </ul>
  @endif
</div>
