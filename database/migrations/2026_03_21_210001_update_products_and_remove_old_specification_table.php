<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('products_specification')) {
            $oldSpecs = DB::table('products_specification')->get();

            foreach ($oldSpecs as $oldSpec) {
                DB::table('specifications')->insert([
                    'product_id' => $oldSpec->product_id,
                    'sku' => 'SKU-'.$oldSpec->product_id.'-'.$oldSpec->id,
                    'price' => $oldSpec->price,
                    'sale_price' => $oldSpec->sale_price,
                    'quantity' => $oldSpec->quantity,
                    'is_active' => true,
                    'sort_order' => 0,
                    'created_at' => $oldSpec->created_at ?? now(),
                    'updated_at' => $oldSpec->updated_at ?? now(),
                ]);
            }
        }

        if (Schema::hasTable('products_specification')) {
            Schema::dropIfExists('products_specification');
        }

        if (Schema::hasColumn('products', 'price')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn(['price', 'sale_price', 'quantity']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('products', 'price')) {
            Schema::table('products', function (Blueprint $table) {
                $table->decimal('price', 10, 2)->default(0)->after('description');
                $table->decimal('sale_price', 10, 2)->nullable()->after('price');
                $table->unsignedInteger('quantity')->default(0)->after('sale_price');
            });
        }

        if (! Schema::hasTable('products_specification')) {
            Schema::create('products_specification', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
                $table->decimal('price', 10, 2)->default(0);
                $table->decimal('sale_price', 10, 2)->nullable();
                $table->unsignedInteger('quantity')->default(0);
                $table->timestamps();
            });
        }
    }
};
