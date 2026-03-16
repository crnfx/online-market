<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<div class="swiper">
  <div class="swiper__wrapper">
    <a class="swiper__link" href="{{ route('catalog')  }}">В каталог</a>
    <div class="swiper__slide">
      <img src="{{ asset('images/girl.webp') }}" alt="Девушка с кондиционером">
    </div>
    <div class="swiper__slide">
      <img src="{{ asset('images/family.webp') }}" alt="Семья">
    </div>
    <div class="swiper__slide">
      <img src="{{ asset('images/employer.webp') }}" alt="Сотрудник">
    </div>
  </div>
  <div class="swiper__pagination"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper', {
      loop: true,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      speed: 800,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 1,
        }
      }
    });
  });
</script>

