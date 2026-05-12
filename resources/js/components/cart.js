document.addEventListener('DOMContentLoaded', function () {
  loadCart();
});

function loadCart() {
  fetch('/cart', {
    method: 'GET',
    headers: {
      'Accept': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
    }
  })
    .then(response => response.json())
    .then(data => {
      if (data.success && data.cart.items.length > 0) {
        renderCart(data.cart);
      } else {
        renderEmptyCart();
      }
    })
    .catch(error => {
      console.error('Error loading cart:', error);
      document.getElementById('cart-container').innerHTML = '<p class="cart-error">Ошибка загрузки корзины</p>';
    });
}

function renderCart(cart) {
  const container = document.getElementById('cart-container');
  let html = `
        <div class="cart-items">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Товар</th>
                <th>Вариант</th>
                <th>Артикул</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
      `;

  cart.items.forEach(item => {
    html += `
          <tr class="cart-item" data-item-id="${item.id}">
            <td class="cart-item__name">${item.product_name}</td>
            <td class="cart-item__variant">${item.variant_name || '—'}</td>
            <td class="cart-item__sku">${item.sku || '—'}</td>
            <td class="cart-item__price">${formatPrice(item.price)} ₽</td>
            <td class="cart-item__quantity">
              <div class="quantity-control">
                <button class="quantity-control__btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})" ${item.quantity <= 1 ? 'disabled' : ''}>−</button>
                <span class="quantity-control__value">${item.quantity}</span>
                <button class="quantity-control__btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
              </div>
            </td>
            <td class="cart-item__total">${formatPrice(item.total)} ₽</td>
            <td class="cart-item__remove">
              <button class="btn-remove" onclick="removeItem(${item.id})">✕</button>
            </td>
          </tr>
        `;
  });

  html += `
            </tbody>
          </table>
        </div>
        <div class="cart-summary">
          <div class="cart-summary__row">
            <span>Товаров: ${cart.items_count}</span>
          </div>
          <div class="cart-summary__row cart-summary__row--total">
            <span>Итого:</span>
            <span class="cart-summary__total">${formatPrice(cart.total)} ₽</span>
          </div>
          <button class="cart-summary__checkout btn btn--primary">Оформить заказ</button>
        </div>
      `;

  container.innerHTML = html;
}

function renderEmptyCart() {
  document.getElementById('cart-container').innerHTML = `
        <div class="cart-empty">
          <p class="cart-empty__text">Ваша корзина пуста</p>
          <a href="/catalog" class="cart-empty__link">Перейти в каталог</a>
        </div>
      `;
}

function updateQuantity(itemId, newQuantity) {
  if (newQuantity < 1) return;

  fetch(`/cart/item/${itemId}`, {
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
    },
    body: JSON.stringify({quantity: newQuantity})
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        loadCart();
      } else {
        alert(data.message || 'Ошибка обновления количества');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Ошибка обновления количества');
    });
}

function removeItem(itemId) {
  if (!confirm('Удалить товар из корзины?')) return;

  fetch(`/cart/item/${itemId}`, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
    }
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        loadCart();
      } else {
        alert(data.message || 'Ошибка удаления товара');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Ошибка удаления товара');
    });
}

function formatPrice(price) {
  return parseFloat(price).toLocaleString('ru-RU');
}
