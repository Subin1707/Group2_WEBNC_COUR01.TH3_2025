<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'showtime_id', 'seat_id', 'quantity', 'total_price', 'status'
    ];

    // Booking thuộc về User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Booking thuộc về suất chiếu
    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    // Booking thuộc về ghế
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
