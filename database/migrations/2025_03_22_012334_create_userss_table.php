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
        Schema::create('userss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->string('email',100)->unique();
            $table->string('password',255);
            $table->string('phone',20);
            $table->text('address');
            $table->enum('role', ['Khách hàng', 'Admin'])->default('Khách hàng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
