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
        Schema::create('paypal_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('payer_id');
            $table->string('payment_id')->nullable()->unique();
            $table->string('payment_source');
            $table->string('facilitator_access_token')->nullable();
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('cart');
            $table->decimal('total_amount', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_transactions');
    }
};
