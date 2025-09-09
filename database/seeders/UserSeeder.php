<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('123456'),
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Staff User',
        'email' => 'staff@example.com',
        'password' => Hash::make('123456'),
        'role' => 'staff',
    ]);

    User::create([
        'name' => 'Customer User',
        'email' => 'customer@example.com',
        'password' => Hash::make('123456'),
        'role' => 'customer',
    ]);
}

}
