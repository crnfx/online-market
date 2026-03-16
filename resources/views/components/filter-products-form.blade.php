<form class="filter-form" method="GET" action="{{ route('catalog') }}">
  <div class="filter-form__row">
    <div class="filter-form__group">
      <label for="search">Поиск</label>
      <input
        type="text"
        id="search"
        name="search"
        value="{{ request('search') }}"
        placeholder="Введите название товара"
      >
    </div>

    <div class="filter-form__group">
      <label for="category_id">Категория</label>
      <select id="category_id" name="category_id">
        <option value="">Все категории</option>
        @foreach(\App\Models\Category::all() as $category)
          <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->description }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="filter-form__group">
      <label for="sort">Сортировка</label>
      <select id="sort" name="sort">
        <option value="created_at" {{ request('sort') === 'created_at' ? 'selected' : '' }}>По дате</option>
        <option value="price" {{ request('sort') === 'price' ? 'selected' : '' }}>По цене</option>
        <option value="popularity" {{ request('sort') === 'popularity' ? 'selected' : '' }}>По популярности</option>
        <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>По названию</option>
      </select>
    </div>

    <div class="filter-form__group">
      <label for="order">Порядок</label>
      <select id="order" name="order">
        <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>По убыванию</option>
        <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>По возрастанию</option>
      </select>
    </div>
  </div>

  <div class="filter-form__row">
    <div class="filter-form__group">
      <label for="price_min">Цена от</label>
      <input
        type="number"
        id="price_min"
        name="price_min"
        value="{{ request('price_min') }}"
        placeholder="0"
        min="0"
        step="0.01"
      >
    </div>

    <div class="filter-form__group">
      <label for="price_max">Цена до</label>
      <input
        type="number"
        id="price_max"
        name="price_max"
        value="{{ request('price_max') }}"
        placeholder="999999"
        min="0"
        step="0.01"
      >
    </div>

    <div class="filter-form__actions">
      <button type="submit" class="btn btn--primary">Применить</button>
      <a href="{{ route('catalog') }}" class="btn btn--secondary">Сбросить</a>
    </div>

  </div>
</form>
