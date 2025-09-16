<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Showtime;
use Carbon\Carbon;

class ShowtimeSeeder extends Seeder
{
    public function run(): void
    {
        $movies = Movie::all();
        $rooms = Room::all();

        foreach ($movies as $movie) {
            foreach ($rooms as $room) {
                // tạo 2 suất chiếu / ngày trong tuần này
                for ($i = 0; $i < 2; $i++) {
                    $start = Carbon::now()->addDays(rand(0, 6))->setTime(rand(10, 20), 0, 0);
                    $end = (clone $start)->addMinutes($movie->duration);

                    Showtime::create([
                        'movie_id' => $movie->id,
                        'room_id' => $room->id,
                        'start_time' => $start,
                        'end_time' => $end,
                        'price' => rand(50000, 120000),
                    ]);
                }
            }
        }
    }
}
