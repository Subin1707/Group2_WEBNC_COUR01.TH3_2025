<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater_id', 'name', 'type', 'total_seats'
    ];

    // Phòng thuộc về một rạp
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    // Một phòng có nhiều ghế
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    // Một phòng có nhiều suất chiếu
    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}
