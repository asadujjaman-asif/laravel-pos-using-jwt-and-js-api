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
        if(!Schema::hasTable('our_companies')){
            Schema::create('our_companies', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->foreign('company_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('company_name',250)->nullable();
                $table->string('short_name',50)->nullable();;
                $table->string('address',500)->nullable();
                $table->string('address_two',500)->nullable();
                $table->string('email',100)->nullable();
                $table->string('phone',15)->nullable();
                $table->string('logo',250)->nullable();
                $table->string('tin_number',50)->nullable();
                $table->string('vat',3)->nullable();
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
        Schema::dropIfExists('our_companies');
    }
};
