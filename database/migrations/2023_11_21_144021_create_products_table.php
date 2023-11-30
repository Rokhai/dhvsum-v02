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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('image')->nullable;
            $table->string('name')->default('Product Name');
            $table->integer('stock')->default(0);
            $table->float('price', 8, 2)->default(0.00);
            $table->text('description')->default('Product Description');
            $table->foreignId('category_id')->nullable;
            $table->boolean('is_active')->default(true);
            $table->boolean('is_approved')->default(false);
            // $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
