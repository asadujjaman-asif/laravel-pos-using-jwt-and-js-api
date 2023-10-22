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
        if(!Schema::hasTable('orders')){
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('id')->on('ec_customers')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('qty',3);
                $table->string('unit_price',8);
                $table->unsignedBigInteger('color_id');
                $table->foreign('color_id')->references('id')->on('colors')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('size_id');
                $table->foreign('size_id')->references('id')->on('sizes')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('cart_id');
                $table->foreign('cart_id')->references('id')->on('carts')->cascadeOnUpdate()->cascadeOnDelete();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
