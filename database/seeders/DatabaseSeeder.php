<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TheaterSeeder::class,
            RoomSeeder::class,
            SeatSeeder::class,
            MovieSeeder::class,
            ShowtimeSeeder::class,
            CustomerSeeder::class,
        ]);
    }

}
