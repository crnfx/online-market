<header class="header">
  <a class="header__logo" href="/">
    <img src="{{ asset('images/Logo.png')  }}" alt="Logo">
  </a>
  <ul class="header__list">
    <li class="header__item"><a class="header__link" href="{{ route('catalog')  }}">Каталог</a></li>
    <li class="header__item"><a class="header__link" href="#">Услуги</a></li>
    <li class="header__item"><a class="header__link" href="#">Акции</a></li>
    <li class="header__item"><a class="header__link" href="#">О нас</a></li>
    <li class="header__item"><a class="header__link" href="#">Контакты</a></li>
  </ul>
  <input name="search" class="header__search" type="text">
</header>
