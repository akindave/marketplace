<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'mobile_number' => '08140642443',
            'email' => 'david@example.com',
            'user_category_id' => '1',
            'account_balance' => '0',
            'code' => '234',
            'password' => 'password'
        ]);
    }
}
