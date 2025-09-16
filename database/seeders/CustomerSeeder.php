<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Sinh 20 khách hàng ngẫu nhiên
        Customer::factory()->count(20)->create();
    }
}
