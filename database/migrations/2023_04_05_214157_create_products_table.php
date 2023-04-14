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
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('slug');
            $table->string('name');
            // $table->unsignedBigInteger('brand_id')->unsinged();
            $table->integer('price');
            $table->integer('max_price')->nullable();
            $table->integer('old_price')->nullable();
            $table->string('percent_off')->nullable();
            $table->longText('description')->nullable();
            $table->integer('stock')->unsinged()->nullable();
            $table->boolean('is_new')->default(false);
            $table->longText('video')->nullable();
            $table->longText('variations')->nullable();
            $table->longText('sizes')->nullable();
            $table->longText('widths')->nullable();
            $table->timestamps();
            // $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
