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
        Schema::create('mercado_pago_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('collection_id');
            $table->string('collection_status');
            $table->string('external_reference')->nullable();
            $table->string('merchant_account_id')->nullable();
            $table->string('merchant_order_id')->nullable();
            $table->string('payment_id');
            $table->string('payment_type');
            $table->string('preference_id');
            $table->string('processing_mode');
            $table->string('site_id');
            $table->string('status');
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('tasks');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mercado_pago_transactions');
    }
};
