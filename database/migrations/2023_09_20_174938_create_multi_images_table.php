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
        if(!Schema::hasTable('multi_images')){
            Schema::create('multi_images', function (Blueprint $table) {
                $table->id();
                $table->string('imageOne',50);
                $table->string('imageTwo',50);
                $table->string('imageThree',50);
                $table->string('imageFour',50);
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('multi_images');
    }
};
