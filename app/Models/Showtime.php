<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id', 'room_id', 'start_time', 'end_time', 'price'
    ];

    // Suất chiếu thuộc về phim
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    // Suất chiếu thuộc về phòng
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Một suất chiếu có nhiều bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
