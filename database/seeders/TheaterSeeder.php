<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheaterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('theaters')->insert([
            ['name' => 'CGV Vincom', 'address' => '72 Le Thanh Ton, Q1', 'region' => 'HCM', 'phone' => '0123456789'],
            ['name' => 'Lotte Cinema', 'address' => '469 Nguyen Huu Tho, Q7', 'region' => 'HCM', 'phone' => '0987654321'],
            ['name' => 'BHD Star', 'address' => '3C Ton Duc Thang, Q1', 'region' => 'HCM', 'phone' => '0909123456'],
        ]);
    }
}
