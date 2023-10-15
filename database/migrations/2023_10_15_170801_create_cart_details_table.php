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
        if(!Schema::hasTable('cart_details')){
            Schema::create('cart_details', function (Blueprint $table) {
                $table->id();
                $table->string('invoice',100);
                $table->string('total_price',8);
                $table->string('payment_status',100);
                $table->string('status',1);
                $table->string('order_date',10);
                $table->string('delivery_date',10);
                $table->unsignedBigInteger('store_id');
                $table->foreign('store_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('customer_id');
                $table->foreign('customer_id')->references('id')->on('ec_customers')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('cart_details');
    }
};
