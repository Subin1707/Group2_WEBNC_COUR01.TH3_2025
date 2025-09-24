<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin test
        User::create([
            'name' => 'Admin Demo',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456'),
        ]);

        // Customer test
        Customer::create([
            'name' => 'Customer Demo',
            'email' => 'customer@test.com',
            'phone' => '0123456789',
            'address' => '123 Demo Street',
            'password' => Hash::make('123456'),
        ]);
    }
}
