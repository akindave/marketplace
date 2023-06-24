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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('mobile_number')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('user_category_id');
            $table->longText('account_balance')->default(0);
            $table->boolean('isVerified')->default(false);
            $table->string('code');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('has_pin')->nullable();
            $table->string('transaction_pin')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();


            // $table->string('name_of_org')->nullable();
            // $table->string('recommendation')->nullable();
            // $table->longText('bio')->nullable();
            // $table->longText('org_logo')->nullable();
            // $table->string('country')->nullable();
            // $table->string('state')->nullable();
            // $table->string('city')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
