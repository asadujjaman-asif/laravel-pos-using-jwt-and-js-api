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
        if(!Schema::hasTable('ec_customers')){
            Schema::create('ec_customers', function (Blueprint $table) {
                $table->id();
                $table->string('customer_name',50)->nullable();
                $table->string('customer_add',500)->nullable();
                $table->string('customer_city',50)->nullable();
                $table->string('customer_state',50)->nullable();
                $table->string('customer_postcode',50)->nullable();
                $table->string('customer_country',50)->nullable();
                $table->string('customer_phone',15)->nullable();
                $table->unsignedBigInteger('ec_user_id');
                $table->foreign('ec_user_id')->references('id')->on('ec_users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('slug',50)->unique();
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
        Schema::dropIfExists('ec_customers');
    }
};
