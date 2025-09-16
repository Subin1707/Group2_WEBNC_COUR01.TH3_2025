<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // Thêm vài phim cố định
        Movie::insert([
            [
                'title' => 'Avengers: Endgame',
                'description' => 'Siêu anh hùng chống lại Thanos.',
                'genre' => 'Action',
                'duration' => 180,
                'release_date' => '2019-04-26',
                'poster' => 'https://via.placeholder.com/300x450.png?text=Endgame',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inception',
                'description' => 'Phi vụ trong giấc mơ.',
                'genre' => 'Sci-Fi',
                'duration' => 148,
                'release_date' => '2010-07-16',
                'poster' => 'https://via.placeholder.com/300x450.png?text=Inception',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Sinh thêm phim ngẫu nhiên
        Movie::factory()->count(8)->create();
    }
}
