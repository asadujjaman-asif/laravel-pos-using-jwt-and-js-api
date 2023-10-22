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
        if(!Schema::hasTable('order_details')){
            Schema::create('order_details', function (Blueprint $table) {
                $table->id();
                $table->string('invoice',100);
                $table->string('vat',50);
                $table->string('total_price',50);
                $table->string('payable',50);
                $table->enum('delivery_status',['Order=0','Pending=1','Processing=2','Completed=3']);
                $table->string('payment_status',1);
                $table->string('tran_id',100);
                $table->string('val_id',100)->default(0);
                $table->string('cus_details',500);
                $table->string('ship_details',500);
                $table->string('order_date',10);
                $table->string('delivery_date',10);
                $table->enum('customer_type',['EcCustomer','InventoryCustomer']);

                $table->unsignedBigInteger('store_id');
                $table->foreign('store_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

                $table->unsignedBigInteger('customer_id');
                $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnUpdate()->cascadeOnDelete();

                $table->unsignedBigInteger('ec_customer_id');
                $table->foreign('ec_customer_id')->references('id')->on('ec_customers')->cascadeOnUpdate()->cascadeOnDelete();
               
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
        Schema::dropIfExists('order_details');
    }
};
