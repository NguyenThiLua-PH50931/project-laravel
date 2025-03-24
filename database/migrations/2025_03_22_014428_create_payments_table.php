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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->enum('payment_method',['Chuyển khoản','Thanh toán khi nhận hàng'])->default('Thanh toán khi nhận hàng');
            $table->enum('status',['Đang chờ thanh toán','Đã thanh toán','Thanh toán thất bại'])->default('Đang chờ thanh toán');
            $table->float('tongTien',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
