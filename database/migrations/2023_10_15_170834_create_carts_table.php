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
        if(!Schema::hasTable('carts')){
            Schema::create('carts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('id')->on('cart_details')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('qty',3);
                $table->string('unit_price',8);
                $table->string('color',100);
                $table->string('size',1);
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
        Schema::dropIfExists('carts');
    }
};
