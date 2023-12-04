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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('coupon_id')->nullable();
            $table->integer('discount_amount')->nullable();
            $table->integer('istimate_total')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('country');
            $table->string('company')->nullable();
            $table->text('address');
            $table->text('address_two')->nullable();
            $table->string('city');
            $table->integer('postal_code');
            $table->bigInteger('mobile');
            $table->tinyInteger('status')->default('0');
            $table->string('note')->nullable();
            $table->string('all_terms');
            $table->string('tracking_id');
            $table->timestamps()->format('asis/dhaka');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
