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
        if(!Schema::hasTable('color_wise_sizes')){
            Schema::create('color_wise_sizes', function (Blueprint $table) {
                $table->id();
                $table->string('qty',5);
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('color_id');
                $table->foreign('color_id')->references('id')->on('colors')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('size_id');
                $table->foreign('size_id')->references('id')->on('sizes')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('color_wise_sizes');
    }
};
