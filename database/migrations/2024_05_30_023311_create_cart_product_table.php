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
        Schema::create('cart_product', function (Blueprint $table) {

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('quantity');

            $table->primary(['product_id', 'customer_id']);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->unique(['product_id', 'customer_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_product');
    }
};
