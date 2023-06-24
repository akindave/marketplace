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
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('shop_owner_id')->unsigned();
            $table->boolean('is_new')->default(true);
            $table->integer('original_price')->nullable();
            $table->integer('discount_price');
            $table->integer('qty_in_stock');
            $table->string('status')->default('pending');
            $table->string('sku')->nullable();
            $table->longText('qr_code_image')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // $table->foreign('shop_owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
