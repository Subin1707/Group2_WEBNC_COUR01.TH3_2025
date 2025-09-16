<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class SeatSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = Room::all();

        foreach ($rooms as $room) {
            $rows = ['A','B','C','D','E'];
            $seatsPerRow = 10;

            foreach ($rows as $row) {
                for ($i = 1; $i <= $seatsPerRow; $i++) {
                    DB::table('seats')->insert([
                        'room_id' => $room->id,
                        'seat_row' => $row,
                        'seat_number' => $i,
                        'status' => 'available',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
