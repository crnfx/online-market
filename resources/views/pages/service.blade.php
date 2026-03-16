@extends('layout.layout')

@section('title', 'Главная')

@section('content')
  <section class="service" aria-label="Прайс-лист услуг" id="service">
    <h2>Наши услуги</h2>
    <table class="service__table" aria-label="Монтаж кондиционеров">
      <thead class="service__head" role="button" aria-expanded="true" tabindex="0">
      <tr>
        <th scope="col">№ 1</th>
        <th scope="col">Монтаж кондиционеров</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Установка сплит-системы мощностью до 3х кВт (С учетом материалов, под ключ)</td>
        <td>16 000</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Установка сплит-системы мощностью от 3 до 5 кВт (С учетом материалов, под ключ)</td>
        <td>18 500</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Установка сплит-системы мощностью от 5 до 7 кВт (С учетом материалов, под ключ)</td>
        <td>23 000</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Установка сплит-системы мощностью от 7 до 9 кВт (С учетом материалов, под ключ)</td>
        <td>28 000</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Установка сплит-системы мощностью от 9 до 14 кВт (С учетом материалов, под ключ)</td>
        <td>36 500</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Установка сплит-системы мощностью 14 кВт и выше (С учетом материалов, под ключ)</td>
        <td>От 36 500</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Монтаж кондиционеров на готовые трассы">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 2</th>
        <th scope="col">Монтаж кондиционеров на готовые трассы</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Установка сплит-системы мощностью до 3х кВт</td>
        <td>9 500</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Установка сплит-системы мощностью от 3 до 5 кВт</td>
        <td>12 500</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Установка сплит-системы мощностью от 5 до 7 кВт</td>
        <td>15 000</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Установка сплит-системы мощностью от 7 до 9 кВт</td>
        <td>18 000</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Установка сплит-системы мощностью от 9 до 14 кВт</td>
        <td>23 000</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Монтаж блоков отдельно друг от друга наружныи/внутреннии</td>
        <td>60/40</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Установка сплит-системы мощностью 14 кВт и выше</td>
        <td>От 23 000</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Демонтаж кондиционеров">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 3</th>
        <th scope="col">Демонтаж кондиционеров</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Демонтаж сплит-системы мощностью до 5 кВт</td>
        <td>4 500</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Демонтаж сплит-системы мощностью от 5 кВт до 7 кВт</td>
        <td>7 500</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Демонтаж сплит-системы мощностью от 7 кВт до 8 кВт</td>
        <td>9 000</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Демонтаж сплит-системы мощностью от 8 кВт до 14 кВт</td>
        <td>14 000</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Демонтаж сплит-системы мощностью от 14 кВт</td>
        <td>Договорная</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Дополнительные работы">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 4</th>
        <th scope="col">Дополнительные работы</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Прокладка трассы 6,35/9,52 мм - 1/4",3/8" (трубы, изоляция труб, межблочный кабель,
          шланг для слива конденсата - с учетом материала)
        </td>
        <td>от 1 200 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Прокладка трассы 6,35/12,7 мм 1/4",1/2" (трубы, изоляция труб, межблочный кабель,
          шланг для слива конденсата - с учетом материала)
        </td>
        <td>от 1 400 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Прокладка трассы 6,35/15,88 мм 1/4",5/8" (трубы, изоляция труб, межблочный кабель,
          шланг для слива конденсата - с учетом материала)
        </td>
        <td>от 2 000 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Прокладка трассы 9,52/15,88 мм 3/8",5/8" (трубы, изоляция труб, межблочный кабель,
          шланг для слива конденсата - с учетом материала)
        </td>
        <td>от 2 400 руб./м.п.
        </td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Прокладка трассы 9,52/19,05 мм 3/8",3/4" (трубы, изоляция труб, межблочный кабель,
          шланг для слива конденсата - с учетом материала)
        </td>
        <td>от 3 000 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Прокладка трассы 12,7/19,05 мм 1/2",3/4" (трубы, изоляция труб, межблочный кабель,
          шланг для слива конденсата - с учетом материала)
        </td>
        <td>от 3 800 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Установка пластикового кабель-канала 60х40 (с учетом материала)</td>
        <td>890 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Установка пластикового кабель-канала 100х55 (с учетом материала)</td>
        <td>1 200 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Прокладка кабеля питания гост 3х1,5 (с учетом материала)</td>
        <td>450 руб./м.п.</td>
      </tr>
      <tr>
        <th scope="row">10</th>
        <td>Прокладка кабеля питания гост 3х1,5 в гофре (с учетом материала)</td>
        <td>500 руб./м.п</td>
      </tr>
      <tr>
        <th scope="row">11</th>
        <td>Прокладка дренажа отдельно от фреонотрассы (с учетом материала)</td>
        <td>350 руб./м.п</td>
      </tr>
      <tr>
        <th scope="row">12</th>
        <td>Пайка труб (пара) 6-10 мм, 6-12 мм (с учетом материала)</td>
        <td>1 200 руб.</td>
      </tr>
      <tr>
        <th scope="row">13</th>
        <td>Пайка труб (пара) 6-15 мм, 10-15 мм, 10-19 мм, 12-19 мм (с учетом материала)</td>
        <td>1 500 руб.</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Высотные работы (альпинистом)">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 5</th>
        <th scope="col">Высотные работы (альпинистом)</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Установка наружного блока кондиционера до 2,5 кВт</td>
        <td>5 500</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Установка наружного блока кондиционера 3,0-5 кВт</td>
        <td>6 500</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Установка наружного блока кондиционера 5-7 кВт</td>
        <td>8 000</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Установка наружного блока кондиционера 7-9 кВт</td>
        <td>11 000</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Установка наружного блока кондиционера 10-18 кВт</td>
        <td>18 000</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Дополнительный вывес альпиниста</td>
        <td>от 4 500</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Сервисное обслуживание кондиционера на высоте</td>
        <td>от 4 500</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Ложный выезд</td>
        <td>1 500</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Автовышка</td>
        <td>От 10 000 руб./смена</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Установка дополнительного оборудования">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 6</th>
        <th scope="col">Установка дополнительного оборудования</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Установка дренажной помпы</td>
        <td>4 000</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Установка дренажной помпы Sauermann SI 2750/aspen (в стоимость входит сама помпа)</td>
        <td>14 500</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Замена дренажного насоса с выездом на обьект (насос не входит в стоимость)</td>
        <td>6 500</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Установка зимнего комплекта (подогрев картера компрессора и поддона и регулятор
          давления конденсации)
        </td>
        <td>От 9 000</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Установка подогрева шланга слива конденсата (с учетом материала)</td>
        <td>От 1 700</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Установка и подключение сифона (без учёта материала)</td>
        <td>1 500</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Установка и пусконаладка блоков ротации для серверных (за услугу без материалов)</td>
        <td>От 18 500</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Установка проводного пульта + прокладка кабеля(до 5м)</td>
        <td>3 800</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Монтаж защитного козырька для наружного блока(козырек крепеж входит в стоимость)</td>
        <td>7 500</td>
      </tr>
      <tr>
        <th scope="row">10</th>
        <td>Монтаж антивандальной защиты для наружного блока(защита и крепеж входит в
          стоимость)
        </td>
        <td>10 500</td>
      </tr>
      <tr>
        <th scope="row">11</th>
        <td>Сервисное обслуживание кондиционера (разборка-сборка, чистка, промывка, дозаправка)</td>
        <td>От 4 000</td>
      </tr>
      <tr>
        <th scope="row">12</th>
        <td>Промывка наружнего блока мойкой высокого давления</td>
        <td>3 000</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Бурение и штробление">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 7</th>
        <th scope="col">Бурение и штробление</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Бурение дополнительного отверстия d40 до 860мм</td>
        <td>1 500</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Бурение дополнительного отверстия d40 от 860мм до 1500мм</td>
        <td>3 500</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Бурение допополнительного отверстия d20</td>
        <td>600</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Устройство отверстий в гипсокартоне и перегородках</td>
        <td>350</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Штробление для дренажа 20х20 мм</td>
        <td>600</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Штробление для дренажа 20х20 мм в бетоне</td>
        <td>900</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Штробление под трассу 50х50 мм</td>
        <td>1 100</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Штробление под трассу 50х50 мм в бетоне</td>
        <td>1 400</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Высокоармированный бетон</td>
        <td>+30%</td>
      </tr>
      <tr>
        <th scope="row">10</th>
        <td>Отверстия в деревянных закладных d20-40мм</td>
        <td>1 500</td>
      </tr>
      </tbody>
    </table>
    <table class="service__table" aria-label="Прочие работы">
      <thead class="service__head" role="button" aria-expanded="false" tabindex="0">
      <tr>
        <th scope="col">№ 8</th>
        <th scope="col">Прочие работы</th>
        <th scope="col">Цена, руб</th>
      </tr>
      </thead>
      <tbody class="service__body">
      <tr>
        <th scope="row">1</th>
        <td>Дозаправка фреоном R22(100 грамм)</td>
        <td>850 руб./100 гр.
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Заправка фреоном R410(100 грамм)</td>
        <td>900руб./100 гр.
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Заправка фреоном R32(100 грамм)</td>
        <td>900 руб./100 гр</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Заправка фреоном (за услугу без материалов)</td>
        <td>3 500
        </td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Разборка навесного потолка типа «армстронг»</td>
        <td>160 руб./м2
        </td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Сборка навесного потолка типа «армстронг»</td>
        <td>300 руб./м2</td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Гермитизация отверстия</td>
        <td>1 000</td>
      </tr>
      <tr>
        <th scope="row">8</th>
        <td>Дополнительный выезд на объект (на второй этап)</td>
        <td>2 500</td>
      </tr>
      <tr>
        <th scope="row">9</th>
        <td>Выезд за пределы КАД или в отдаленные районы СПБ (Стрельна, Ломоносов и т.д.)
          дорога оплачивается в одну сторону
        </td>
        <td>60 руб./км</td>
      </tr>
      <tr>
        <th scope="row">10</th>
        <td>Выезд и диагностика специалиста по ремонту</td>
        <td>3 000</td>
      </tr>
      <tr>
        <th scope="row">11</th>
        <td>Работа с плиткой вент. Фасада, крепеж наружных блоков на фасад с утеплением</td>
        <td>1 500</td>
      </tr>
      <tr>
        <th scope="row">12</th>
        <td>Выезд на замеры(осмотр)</td>
        <td>От 1 500</td>
      </tr>
      <tr>
        <th scope="row">13</th>
        <td>Работы на высоте более 3х метров (Вышка тура, лестница и пр.)</td>
        <td>Коэф 1.1
        </td>
      </tr>
      <tr>
        <th scope="row">14</th>
        <td>Подъем оборудования и доставка заблаговременно, погрузка разгрузка материалов и
          кондиционеров
        </td>
        <td>2 000</td>
      </tr>
      </tbody>
    </table>
  </section>
@endsection
