<form class="contact-form" method="POST" action="{{ route('contact.send') }}">
  @csrf

  <h3 class="contact-form__title">Свяжитесь с нами</h3>

  @php
    $errorsBag = session('errors', new \Illuminate\Support\MessageBag());
  @endphp

  @if(session('success'))
    <div class="contact-form__message contact-form__message--success">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="contact-form__message contact-form__message--error">
      {{ session('error') }}
    </div>
  @endif

  <div class="contact-form__group">
    <label for="contact-name" class="contact-form__label">Ваше имя</label>
    <input
      id="contact-name"
      class="contact-form__input {{ $errorsBag->has('name') ? 'contact-form__input--error' : '' }}"
      name="name"
      type="text"
      placeholder="Введите ваше имя"
      value="{{ old('name') }}"
      required
    >
    @if($errorsBag->has('name'))
      <span class="contact-form__error">{{ $errorsBag->first('name') }}</span>
    @endif
  </div>

  <div class="contact-form__group">
    <label for="contact-phone" class="contact-form__label">Телефон</label>
    <input
      id="contact-phone"
      class="contact-form__input {{ $errorsBag->has('phone') ? 'contact-form__input--error' : '' }}"
      name="phone"
      type="tel"
      placeholder="+7 (999) 123-45-67"
      value="{{ old('phone') }}"
    >
    @if($errorsBag->has('phone'))
      <span class="contact-form__error">{{ $errorsBag->first('phone') }}</span>
    @endif
  </div>

  <div class="contact-form__group">
    <label for="contact-email" class="contact-form__label">Email</label>
    <input
      id="contact-email"
      class="contact-form__input {{ $errorsBag->has('email') ? 'contact-form__input--error' : '' }}"
      name="email"
      type="email"
      placeholder="example@mail.ru"
      value="{{ old('email') }}"
      required
    >
    @if($errorsBag->has('email'))
      <span class="contact-form__error">{{ $errorsBag->first('email') }}</span>
    @endif
  </div>

  <div class="contact-form__group">
    <label for="contact-comment" class="contact-form__label">Сообщение</label>
    <textarea
      id="contact-comment"
      class="contact-form__textarea {{ $errorsBag->has('comment') ? 'contact-form__textarea--error' : '' }}"
      name="comment"
      placeholder="Напишите ваш вопрос или сообщение..."
      rows="4"
    >{{ old('comment') }}</textarea>
    @if($errorsBag->has('comment'))
      <span class="contact-form__error">{{ $errorsBag->first('comment') }}</span>
    @endif
  </div>

  <button type="submit" class="contact-form__button">
    Отправить
  </button>
</form>
