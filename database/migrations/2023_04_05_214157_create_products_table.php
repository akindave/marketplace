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

            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->string('slug')->unique('slug');
            $table->longText('description')->nullable();
            $table->longText('product_image')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');


            // $table->unsignedBigInteger('brand_id')->unsinged();
            //
            // $table->integer('stock')->unsinged()->nullable();
            // $table->longText('variations')->nullable();
            // $table->longText('sizes')->nullable();
            // $table->longText('widths')->nullable();
            // $table->softDeletes();

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
