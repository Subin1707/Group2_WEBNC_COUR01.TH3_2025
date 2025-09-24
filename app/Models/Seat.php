<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 'seat_number', 'type', 'status'
    ];

    // Ghế thuộc về một phòng
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Ghế có thể xuất hiện trong nhiều bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
