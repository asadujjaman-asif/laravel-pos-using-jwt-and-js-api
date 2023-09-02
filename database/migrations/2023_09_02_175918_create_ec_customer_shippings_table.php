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
        Schema::create('ec_customer_shippings', function (Blueprint $table) {
            $table->id();
            $table->string('shipp_name',50)->nullable();
            $table->string('shipp_add',500)->nullable();
            $table->string('shipp_city',50)->nullable();
            $table->string('shipp_state',50)->nullable();
            $table->string('shipp_postcode',50)->nullable();
            $table->string('shipp_country',50)->nullable();
            $table->string('shipp_phone',15)->nullable();
            $table->unsignedBigInteger('ec_user_id');
            $table->foreign('ec_user_id')->references('id')->on('ec_users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec_customer_shippings');
    }
};
