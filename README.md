# Laravel online-market project

## To start project, follow next commands

```bash
1. git clone https://github.com/crnfx/online-market.git
2. cd online-market
```

```bash
1. composer install
2. npm install
3. ./vendor/bin/sail up -d
4. npm run dev
```

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

## Database structure

| Папка                   | Назначение             |
|-------------------------|------------------------|
| `app/Models/`           | Eloquent модели        |
| `app/Http/Controllers/` | Контроллеры приложения |
| `app/Http/Middleware/`  | Промежуточное ПО       |
| `database/migrations/`  | Миграции БД            |
| `database/seeders/`     | Наполнители данных     |
| `resources/views/`      | Шаблоны Blade          |
| `resources/js/`         | JavaScript файлы       |
| `resources/css/`        | Стили                  |

## Models

| Модель          | Описание                                              |
|-----------------|-------------------------------------------------------|
| `User`          | Пользователи                                          |
| `Category`      | Категории товаров                                     |
| `Product`       | Товары (без цен, только информация)                   |
| `Specification` | **SKU-варианты товаров** (цена, количество, атрибуты) |
| `ProductImage`  | Изображения товаров                                   |
| `Cart`          | Корзина покупок                                       |
| `CartItem`      | Элементы корзины (с привязкой к Specification)        |
| `Order`         | Заказы (9 статусов)                                   |
| `OrderItem`     | Элементы заказа (с привязкой к Specification)         |
