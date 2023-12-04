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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            //The discount coupon code
            $table->string('code')->unique();

            //The human readable discount code name
            $table->string('name')->nullable()->unique();

            //The description of the coupon - Not necessary
            $table->text('description')->nullable();

            //The max uses this discount coupon has
            $table->integer('max_uses')->nullable();

            //How many time a user can use this discount coupon
            $table->integer('max_uses_user')->nullable();

            //Whether or not the coupon is a percentage or a fixed price
            $table->enum('type',['percent', 'fixed'])->default('fixed');

            //The amount to discount based on type
            $table->integer('discount_amount');

            //The minimum amount to discount based on type
            $table->double('min_amount',10,2)->nullable();

            //The coupon status
            $table->integer('status')->default(1);

            //When the coupon begins
            $table->timestamp('starts_at')->nullable();

            //When the coupon ends
            $table->timestamp('expires_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
