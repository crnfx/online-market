<header class="header">
  <a class="header__logo" href="/">
    <img src="{{ asset('images/Logo.png')  }}" alt="Logo">
  </a>
  <ul class="header__list">
    <li class="header__item"><a class="header__link" href="{{ route('catalog')  }}">Каталог</a></li>
    <li class="header__item"><a class="header__link" href="{{ route('service') }}">Услуги</a></li>
    <li class="header__item"><a class="header__link" href="#">Контакты</a></li>
  </ul>
  <form class="header__search-form" method="GET" action="{{ route('catalog') }}" role="search">
    <label for="header-search" class="visually-hidden">Поиск товаров</label>
    <input
      id="header-search"
      name="search"
      class="header__search-input"
      type="search"
      placeholder="Введите название товара"
      value="{{ request('search') }}"
      aria-label="Поиск товаров"
    >
    <button class="header__search-btn" type="submit" aria-label="Найти">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"></circle>
        <path d="m21 21-4.35-4.35"></path>
      </svg>
    </button>
  </form>
</header>
