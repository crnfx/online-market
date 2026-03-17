<footer class="footer">
  <div class="container">
    <div class="footer__wrapper">

      <nav class="footer__nav">
        <h4 class="footer__title">Навигация</h4>
        <ul class="footer__list">
          <li class="footer__item">
            <a href="{{ route('home') }}" class="footer__link">Главная</a>
          </li>
          <li class="footer__item">
            <a href="{{ route('catalog') }}" class="footer__link">Каталог</a>
          </li>
          <li class="footer__item">
            <a href="{{ route('service') }}" class="footer__link">Услуги</a>
          </li>
          <li class="footer__item">
            <a href="#" class="footer__link">О компании</a>
          </li>
        </ul>
      </nav>

      <div class="footer__form">
        <h4 class="footer__title">Напишите нам</h4>
        @component('components.contact-form', [])
        @endcomponent
      </div>

      <div class="footer__contacts">
        <h4 class="footer__title">Контакты</h4>
        <ul class="footer__list">
          <li class="footer__item">
            <span class="footer__icon">📞</span>
            <a href="tel:+78001234567" class="footer__link">8 (800) 123-45-67</a>
          </li>
          <li class="footer__item">
            <span class="footer__icon">✉️</span>
            <a href="mailto:info@onlinemarket.ru" class="footer__link">info@onlinemarket.ru</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="footer__bottom">
      <p class="footer__copyright">
        © {{ date('Y') }} Кондейкин. Все права защищены.
      </p>
    </div>
  </div>
</footer>
