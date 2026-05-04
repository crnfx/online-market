<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreignId('specification_id')->nullable()->after('product_id')->constrained()->onDelete('set null');
            $table->index('specification_id');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('specification_id')->nullable()->after('product_id')->constrained()->onDelete('set null');
            $table->string('sku')->nullable()->after('product_name');
            $table->string('variant_name')->nullable()->after('sku');
            $table->index('specification_id');
            $table->index('sku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['specification_id']);
            $table->dropIndex(['specification_id']);
            $table->dropColumn('specification_id');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['specification_id']);
            $table->dropIndex(['specification_id']);
            $table->dropIndex(['sku']);
            $table->dropColumn(['specification_id', 'sku', 'variant_name']);
        });
    }
};
