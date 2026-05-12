@props([
  'specifications' => [],
  'productName' => ''
])

@if($specifications && count($specifications) > 0)

  <div class="specification-selector"
       data-product-id="{{ $specifications->first()->product_id }}"
       data-product-name="{{ $productName }}">

    <input type="hidden" name="specification_id" id="specification_id" value="{{ $specifications->first()->id }}">
    <input type="hidden" name="sku" id="selected_sku" value="{{ $specifications->first()->sku }}">

    @php
      $attributeGroups = [];
      foreach ($specifications as $spec) {
        if ($spec->attributes) {
          foreach ($spec->attributes as $key => $value) {
            if (!isset($attributeGroups[$key])) {
              $attributeGroups[$key] = [];
            }
            if (!in_array($value, $attributeGroups[$key])) {
              $attributeGroups[$key][] = $value;
            }
          }
        }
      }
    @endphp

    {{-- Выбор атрибутов --}}
    @foreach($attributeGroups as $attributeName => $values)
      @if(count($values) > 1)
        <div class="specification-selector__group" data-attribute="{{ $attributeName }}">
          <label class="specification-selector__label">
            {{ ucfirst($attributeName) }}:
          </label>
          <div class="specification-selector__options">
            @foreach($values as $value)
              <button type="button"
                      class="specification-selector__option {{ $loop->first ? 'active' : '' }}"
                      data-attribute="{{ $attributeName }}"
                      data-value="{{ $value }}">
                {{ $value }}
              </button>
            @endforeach
          </div>
        </div>
      @endif
    @endforeach

    @if($specifications->first()->name && empty($attributeGroups))
      <div class="specification-selector__group">
        <label class="specification-selector__label">Вариант:</label>
        <select name="specification_select" id="specification_select" class="specification-selector__select">
          @foreach($specifications as $spec)
            <option value="{{ $spec->id }}"
                    data-sku="{{ $spec->sku }}"
                    data-price="{{ $spec->price }}"
                    data-sale-price="{{ $spec->sale_price }}"
                    data-quantity="{{ $spec->quantity }}"
              {{ $loop->first ? 'selected' : '' }}>
              {{ $spec->name }} @if($spec->quantity > 0)
                (в наличии)
              @else(нет в наличии)@endif
            </option>
          @endforeach
        </select>
      </div>
    @endif

    <div class="specification-selector__info">
      <div class="specification-selector__price-block">
        <span class="specification-selector__price-title">Цена:</span>
        @php
          $firstSpec = $specifications->first();
          $hasSale = $firstSpec->sale_price !== null;
        @endphp
        <div class="specification-selector__prices">
          @if($hasSale)
            <span class="specification-selector__old-price" id="old_price">
              {{ number_format((float) $firstSpec->price, 0, '.', ' ') }} ₽
            </span>
            <span class="specification-selector__sale-price" id="sale_price">
              {{ number_format((float) $firstSpec->sale_price, 0, '.', ' ') }} ₽
            </span>
          @else
            <span class="specification-selector__current-price" id="current_price">
              {{ number_format((float) $firstSpec->price, 0, '.', ' ') }} ₽
            </span>
          @endif
        </div>
      </div>

      <div class="specification-selector__stock">
        <span class="specification-selector__stock-title">Наличие:</span>
        <span id="stock_status" class="{{ $firstSpec->quantity > 0 ? 'in-stock' : 'out-of-stock' }}">
          @if($firstSpec->quantity > 0)
            В наличии: {{ $firstSpec->quantity }} шт.
          @else
            Нет в наличии
          @endif
        </span>
      </div>

      <div class="specification-selector__sku">
        <span class="specification-selector__sku-title">Артикул:</span>
        <span id="sku_value">{{ $firstSpec->sku }}</span>
      </div>
    </div>

    <div class="specification-selector__actions">
      <div class="quantity-selector">
        <button type="button" class="quantity-selector__btn quantity-selector__btn--minus" data-action="minus">−
        </button>
        <input type="number" name="quantity" id="quantity" class="quantity-selector__input" value="1" min="1"
               max="{{ $firstSpec->quantity }}">
        <button type="button" class="quantity-selector__btn quantity-selector__btn--plus" data-action="plus">+</button>
      </div>

      <button type="button"
              class="specification-selector__add-to-cart btn btn--primary"
              id="add_to_cart_btn"
        {{ $firstSpec->quantity <= 0 ? 'disabled' : '' }}>
        <span class="btn__text">В корзину</span>
      </button>
    </div>
  </div>
@endif

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const selector = document.querySelector('.specification-selector');
      if (!selector) return;

      const specifications = {!! json_encode($specifications->map(function($s) {
    return [
      'id' => $s->id,
      'sku' => $s->sku,
      'name' => $s->name,
      'price' => (float) $s->price,
      'sale_price' => $s->sale_price ? (float) $s->sale_price : null,
      'quantity' => (int) $s->quantity,
      'attributes' => $s->attributes ?? []
    ];
  })->toArray()) !!};

      let currentSpecId = specifications[0] ? specifications[0].id : null;

      selector.querySelectorAll('.specification-selector__option').forEach(function (option) {
        option.addEventListener('click', function () {
          const attribute = this.dataset.attribute;
          const value = this.dataset.value;

          this.parentElement.querySelectorAll('.specification-selector__option').forEach(function (opt) {
            opt.classList.remove('active');
          });
          this.classList.add('active');

          const selectedOptions = selector.querySelectorAll('.specification-selector__option.active');
          let selectedAttributes = {};
          selectedOptions.forEach(function (opt) {
            selectedAttributes[opt.dataset.attribute] = opt.dataset.value;
          });

          let matchedSpec = null;
          for (let i = 0; i < specifications.length; i++) {
            let spec = specifications[i];
            if (!spec.attributes) continue;

            let isMatch = true;
            for (let key in selectedAttributes) {
              if (spec.attributes[key] !== selectedAttributes[key]) {
                isMatch = false;
                break;
              }
            }

            if (isMatch) {
              matchedSpec = spec;
              break;
            }
          }

          if (matchedSpec) {
            updateSpecification(matchedSpec);
          }
        });
      });

      const selectEl = selector.querySelector('#specification_select');
      if (selectEl) {
        selectEl.addEventListener('change', function () {
          for (let i = 0; i < specifications.length; i++) {
            if (specifications[i].id == this.value) {
              updateSpecification(specifications[i]);
              break;
            }
          }
        });
      }

      function updateSpecification(spec) {
        currentSpecId = spec.id;

        document.getElementById('specification_id').value = spec.id;
        document.getElementById('selected_sku').value = spec.sku;

        let hasSale = spec.sale_price !== null;
        const oldPriceEl = document.getElementById('old_price');
        const salePriceEl = document.getElementById('sale_price');
        const currentPriceEl = document.getElementById('current_price');

        if (hasSale) {
          if (oldPriceEl) oldPriceEl.textContent = formatPrice(spec.price) + ' ₽';
          if (salePriceEl) salePriceEl.textContent = formatPrice(spec.sale_price) + ' ₽';
          if (oldPriceEl) oldPriceEl.style.display = 'inline';
          if (salePriceEl) salePriceEl.style.display = 'inline';
          if (currentPriceEl) currentPriceEl.style.display = 'none';
        } else {
          if (currentPriceEl) currentPriceEl.textContent = formatPrice(spec.price) + ' ₽';
          if (oldPriceEl) oldPriceEl.style.display = 'none';
          if (salePriceEl) salePriceEl.style.display = 'none';
          if (currentPriceEl) currentPriceEl.style.display = 'inline';
        }

        const stockStatus = document.getElementById('stock_status');
        const quantityInput = document.getElementById('quantity');
        if (spec.quantity > 0) {
          stockStatus.textContent = 'В наличии: ' + spec.quantity + ' шт.';
          stockStatus.className = 'in-stock';
          document.getElementById('add_to_cart_btn').disabled = false;
          quantityInput.max = spec.quantity;
        } else {
          stockStatus.textContent = 'Нет в наличии';
          stockStatus.className = 'out-of-stock';
          document.getElementById('add_to_cart_btn').disabled = true;
        }

        const skuValue = document.getElementById('sku_value');
        if (skuValue) skuValue.textContent = spec.sku;

        quantityInput.value = 1;
      }

      function formatPrice(price) {
        return parseFloat(price).toLocaleString('ru-RU');
      }

      const minusBtn = selector.querySelector('[data-action="minus"]');
      if (minusBtn) {
        minusBtn.addEventListener('click', function () {
          const input = document.getElementById('quantity');
          let min = parseInt(input.min) || 1;
          if (parseInt(input.value) > min) {
            input.value = parseInt(input.value) - 1;
          }
        });
      }

      const plusBtn = selector.querySelector('[data-action="plus"]');
      if (plusBtn) {
        plusBtn.addEventListener('click', function () {
          const input = document.getElementById('quantity');
          let max = parseInt(input.max) || 999;
          if (parseInt(input.value) < max) {
            input.value = parseInt(input.value) + 1;
          }
        });
      }

      const addToCartBtn = selector.querySelector('#add_to_cart_btn');
      if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function () {
          const specificationId = document.getElementById('specification_id').value;
          const quantity = document.getElementById('quantity').value;
          const productId = selector.dataset.productId;
          const csrfTokenEl = document.querySelector('meta[name="csrf-token"]');
          let csrfToken = csrfTokenEl ? csrfTokenEl.content : '';

          fetch('/cart/add', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
              product_id: productId,
              specification_id: specificationId,
              quantity: quantity
            })
          })
            .then(function (response) {
              return response.json();
            })
            .then(function (data) {
              if (data.success) {
                alert('Товар добавлен в корзину!');
              } else {
                alert(data.message || 'Ошибка добавления в корзину');
              }
            })
            .catch(function (error) {
              console.error('Error:', error);
              alert('Ошибка добавления в корзину');
            });
        });
      }
    });
  </script>
@endpush
