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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // user_id
            $table->foreignId('product_id');
            $table->foreignId('order_id');
            $table->string('amount');
            $table->string('payment_method');
            $table->string('payment_status'); // pending, paid, failed
            $table->string('gcash_number')->nullable();
            $table->string('gcash_transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
