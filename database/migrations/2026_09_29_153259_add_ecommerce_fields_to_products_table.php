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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('price')->nullable()->after('detail_content');
            $table->unsignedBigInteger('original_price')->nullable()->after('price');
            $table->unsignedBigInteger('subscription_price')->nullable()->after('original_price');
            $table->string('sku')->nullable()->after('slug');
            $table->string('badge')->nullable()->after('sku');
            $table->text('hook')->nullable()->after('badge');
            $table->string('stock_status')->default('in_stock')->after('hook');
            $table->integer('stock_count')->default(20)->after('stock_status');
            $table->decimal('rating', 3, 1)->default(4.9)->after('stock_count');
            $table->integer('reviews_count')->default(42)->after('rating');
            $table->text('package_includes')->nullable()->after('reviews_count');
            $table->string('warranty_info')->default('Garansi Resmi 12 Bulan Tukar Baru')->after('package_includes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'price', 'original_price', 'subscription_price', 'sku', 'badge',
                'hook', 'stock_status', 'stock_count', 'rating', 'reviews_count',
                'package_includes', 'warranty_info'
            ]);
        });
    }
};
