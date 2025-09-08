<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'room_id',
        'start_time',
        'end_time',
        'price',
    ];

    // Quan hệ: suất chiếu thuộc 1 phim
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    // Quan hệ: suất chiếu thuộc 1 phòng
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Quan hệ: suất chiếu có nhiều vé
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
