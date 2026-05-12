<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Specification;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'conditioners' => Category::firstOrCreate(
                ['name' => 'conditioners'],
                ['description' => 'Кондиционеры']
            ),
            'ventilation' => Category::firstOrCreate(
                ['name' => 'ventilation'],
                ['description' => 'Вентиляция']
            ),
        ];

        $products = [
            [
                'category' => 'conditioners',
                'name' => 'Fujitsu Genios',
                'slug' => 'fujitsu-genios',
                'description' => 'Инверторный кондиционер Fujitsu Genios с функцией самоочистки и низким уровнем шума. Идеальное решение для спальни.',
                'specifications' => [
                    ['sku' => 'FUJ-GEN-07', 'name' => '7000 BTU', 'price' => 45000, 'sale_price' => 39900, 'quantity' => 15, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'FUJ-GEN-09', 'name' => '9000 BTU', 'price' => 48000, 'sale_price' => 42900, 'quantity' => 10, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                    ['sku' => 'FUJ-GEN-12', 'name' => '12000 BTU', 'price' => 52000, 'sale_price' => 46900, 'quantity' => 8, 'attributes' => ['power' => '12000 BTU', 'area' => '35 м²']],
                ],
                'images' => [
                    'fujitsu-genios-front.png',
                    'fujitsu-genios-back.png',
                    'fujitsu-remote.jpg',
                ],
                'main_image' => 'fujitsu-genios-front.png',
            ],
            [
                'category' => 'conditioners',
                'name' => 'Fujitsu Standard',
                'slug' => 'fujitsu-standard',
                'description' => 'Надёжный кондиционер базовой серии от Fujitsu. Простое управление, высокое качество.',
                'specifications' => [
                    ['sku' => 'FUJ-STD-07', 'name' => '7000 BTU', 'price' => 32000, 'sale_price' => null, 'quantity' => 8, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'FUJ-STD-09', 'name' => '9000 BTU', 'price' => 35000, 'sale_price' => null, 'quantity' => 5, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                ],
                'images' => [
                    'fujitsu-sm.png',
                    'fujitsu-remote.png',
                ],
                'main_image' => 'fujitsu-sm.png',
            ],

            [
                'category' => 'conditioners',
                'name' => 'Lessar Inverter',
                'slug' => 'lessar-inverter',
                'description' => 'Инверторный кондиционер Lessar с высоким энергоэффективностью класса A++.',
                'specifications' => [
                    ['sku' => 'LES-INV-07', 'name' => '7000 BTU', 'price' => 38000, 'sale_price' => 34900, 'quantity' => 20, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'LES-INV-09', 'name' => '9000 BTU', 'price' => 41000, 'sale_price' => 37900, 'quantity' => 15, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                ],
                'images' => [
                    'LessarInvertFront.png',
                    'LessarInvertBack.jpg',
                    'LessarInvertRemote.jpg',
                ],
                'main_image' => 'LessarInvertFront.png',
            ],
            [
                'category' => 'conditioners',
                'name' => 'Lessar Split',
                'slug' => 'lessar-split',
                'description' => 'Сплит-система Lessar для помещений до 25 кв.м. Тихий и эффективный.',
                'specifications' => [
                    ['sku' => 'LES-SPL-07', 'name' => '7000 BTU', 'price' => 29000, 'sale_price' => null, 'quantity' => 12, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'LES-SPL-09', 'name' => '9000 BTU', 'price' => 32000, 'sale_price' => null, 'quantity' => 10, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                ],
                'images' => [
                    'LessarSplitFront.png',
                    'LessarSplitBack.jpg',
                    'LessarSplitRemote.jpg',
                    'lessar-sm.png',
                ],
                'main_image' => 'LessarSplitFront.png',
            ],

            [
                'category' => 'conditioners',
                'name' => 'Quattroclima Inverter',
                'slug' => 'quattroclima-inverter',
                'description' => 'Инверторный кондиционер Quattroclima с функцией турбо-охлаждения.',
                'specifications' => [
                    ['sku' => 'QUA-INV-07', 'name' => '7000 BTU', 'price' => 35000, 'sale_price' => 29900, 'quantity' => 10, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'QUA-INV-09', 'name' => '9000 BTU', 'price' => 38000, 'sale_price' => 32900, 'quantity' => 8, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                ],
                'images' => [
                    'quattroinvertorfront.png',
                    'quattroinvertback.png',
                    'quattroinvertremote.png',
                    'quattroclima-sm.png',
                ],
                'main_image' => 'quattroinvertorfront.png',
            ],

            [
                'category' => 'conditioners',
                'name' => 'Tosot Lyra R32',
                'slug' => 'tosot-lyra-r32',
                'description' => 'Кондиционер Tosot Lyra с экологичным фреоном R32. Высокая энергоэффективность.',
                'specifications' => [
                    ['sku' => 'TOS-LYR-07', 'name' => '7000 BTU', 'price' => 42000, 'sale_price' => null, 'quantity' => 7, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'TOS-LYR-09', 'name' => '9000 BTU', 'price' => 45000, 'sale_price' => null, 'quantity' => 5, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                ],
                'images' => [
                    'LyraInterverterR32Front.png',
                    'LyraInterverterR32Back.jpg',
                    'LyraInterverterR32remote.jpg',
                ],
                'main_image' => 'LyraInterverterR32Front.png',
            ],
            [
                'category' => 'conditioners',
                'name' => 'Tosot Lyra Split',
                'slug' => 'tosot-lyra-split',
                'description' => 'Сплит-система Tosot Lyra для комфортного климата в вашем доме.',
                'specifications' => [
                    ['sku' => 'TOS-SPR-07', 'name' => '7000 BTU', 'price' => 36000, 'sale_price' => 32900, 'quantity' => 14, 'attributes' => ['power' => '7000 BTU', 'area' => '20 м²']],
                    ['sku' => 'TOS-SPR-09', 'name' => '9000 BTU', 'price' => 39000, 'sale_price' => 35900, 'quantity' => 10, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                ],
                'images' => [
                    'LyraSplitFront.png',
                    'LyraSplitBack.jpg',
                    'LyraSplitRemote.jpg',
                ],
                'main_image' => 'LyraSplitFront.png',
            ],
            [
                'category' => 'conditioners',
                'name' => 'Tosot R32',
                'slug' => 'tosot-r32',
                'description' => 'Современный кондиционер Tosot с фреоном R32 и intelligent управлением.',
                'specifications' => [
                    ['sku' => 'TOS-R32-09', 'name' => '9000 BTU', 'price' => 48000, 'sale_price' => null, 'quantity' => 5, 'attributes' => ['power' => '9000 BTU', 'area' => '25 м²']],
                    ['sku' => 'TOS-R32-12', 'name' => '12000 BTU', 'price' => 52000, 'sale_price' => null, 'quantity' => 3, 'attributes' => ['power' => '12000 BTU', 'area' => '35 м²']],
                ],
                'images' => [
                    'TosotR32Front.png',
                    'TosotR32Backk.jpg',
                    'TosotR32remote.jpg',
                ],
                'main_image' => 'TosotR32Front.png',
            ],

            [
                'category' => 'ventilation',
                'name' => 'Lessar Ventilation',
                'slug' => 'lessar-ventilation',
                'description' => 'Приточно-вытяжная установка Lessar для создания комфортного микроклимата.',
                'specifications' => [
                    ['sku' => 'LES-VENT-100', 'name' => '100 м³/ч', 'price' => 55000, 'sale_price' => null, 'quantity' => 6, 'attributes' => ['capacity' => '100 м³/ч']],
                    ['sku' => 'LES-VENT-200', 'name' => '200 м³/ч', 'price' => 65000, 'sale_price' => null, 'quantity' => 4, 'attributes' => ['capacity' => '200 м³/ч']],
                ],
                'images' => [
                    'LessarVentilation.png',
                ],
                'main_image' => 'LessarVentilation.png',
            ],

            [
                'category' => 'ventilation',
                'name' => 'Sofio Primo',
                'slug' => 'sofio-primo',
                'description' => 'Вентиляционная установка Sofio Primo с рекуперацией тепла.',
                'specifications' => [
                    ['sku' => 'SOF-PRI-150', 'name' => '150 м³/ч', 'price' => 68000, 'sale_price' => 59900, 'quantity' => 4, 'attributes' => ['capacity' => '150 м³/ч', 'recovery' => 'yes']],
                    ['sku' => 'SOF-PRI-250', 'name' => '250 м³/ч', 'price' => 78000, 'sale_price' => 69900, 'quantity' => 3, 'attributes' => ['capacity' => '250 м³/ч', 'recovery' => 'yes']],
                ],
                'images' => [
                    'SoffioPrimo.png',
                    'SofioRemote.png',
                ],
                'main_image' => 'SoffioPrimo.png',
            ],

            [
                'category' => 'ventilation',
                'name' => 'Vento System',
                'slug' => 'vento-system',
                'description' => 'Система вентиляции Vento для загородных домов и квартир.',
                'specifications' => [
                    ['sku' => 'VEN-SYS-200', 'name' => '200 м³/ч', 'price' => 72000, 'sale_price' => null, 'quantity' => 3, 'attributes' => ['capacity' => '200 м³/ч']],
                    ['sku' => 'VEN-SYS-300', 'name' => '300 м³/ч', 'price' => 85000, 'sale_price' => null, 'quantity' => 2, 'attributes' => ['capacity' => '300 м³/ч']],
                ],
                'images' => [
                    'VentoVentilation.png',
                    'VentoRemote.png',
                ],
                'main_image' => 'VentoVentilation.png',
            ],
        ];

        foreach ($products as $productData) {
            $categoryName = $productData['category'];
            $specifications = $productData['specifications'] ?? [];
            $images = $productData['images'];
            $mainImage = $productData['main_image'];

            unset($productData['category'], $productData['specifications'], $productData['images'], $productData['main_image']);

            $product = Product::create([
                ...$productData,
                'category_id' => $categories[$categoryName]->id,
                'is_active' => true,
                'sales_count' => rand(0, 20),
                'views_count' => rand(50, 500),
            ]);

            foreach ($specifications as $index => $specData) {
                Specification::create([
                    'product_id' => $product->id,
                    'sku' => $specData['sku'],
                    'name' => $specData['name'],
                    'price' => $specData['price'],
                    'sale_price' => $specData['sale_price'],
                    'quantity' => $specData['quantity'],
                    'attributes' => $specData['attributes'] ?? null,
                    'is_active' => true,
                    'sort_order' => $index,
                ]);
            }

            foreach ($images as $index => $imageFile) {
                $path = "products/{$categoryName}/" . $this->getBrandFolder($productData['name']) . "/{$imageFile}";

                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'alt' => $productData['name'],
                    'is_main' => $imageFile === $mainImage,
                    'sort_order' => $index,
                ]);
            }
        }
    }

    private function getBrandFolder(string $productName): string
    {
        $brandFolders = [
            'Fujitsu' => 'fujitsu',
            'Lessar' => 'lessar',
            'Quattroclima' => 'quattroclima',
            'Tosot' => 'tosot',
            'Sofio' => 'sofio',
            'Vento' => 'vento',
        ];

        foreach ($brandFolders as $brand => $folder) {
            if (str_contains($productName, $brand)) {
                return $folder;
            }
        }

        return 'other';
    }
}
