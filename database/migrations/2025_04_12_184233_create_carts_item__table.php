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
        Schema::create('carts_item_', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id'); // Mỗi item thuộc về một giỏ hàng
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->unsignedInteger('product_id'); // ID sản phẩm
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts_item_');
    }
};
