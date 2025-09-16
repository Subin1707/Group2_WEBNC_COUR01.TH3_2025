<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Theater;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $theaters = Theater::all();

        foreach ($theaters as $theater) {
            for ($i = 1; $i <= 3; $i++) { // mỗi rạp 3 phòng
                DB::table('rooms')->insert([
                    'theater_id' => $theater->id,
                    'name' => "Room $i",
                    'type' => fake()->randomElement(['2D','3D','IMAX']),
                    'total_seats' => 50,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
