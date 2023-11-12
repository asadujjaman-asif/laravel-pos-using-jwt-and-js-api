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

        if(!Schema::hasTable('sslcommerz_accounts')){
            Schema::create('sslcommerz_accounts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->foreign('company_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('store_id');
                $table->string('store_passwd');
                $table->string('currency');
                $table->string('success_url');
                $table->string('fail_url');
                $table->string('cancel_url');
                $table->string('ipn_url');
                $table->string('init_url');
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
        Schema::dropIfExists('sslcommerz_accounts');
    }
};
