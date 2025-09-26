<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'showtime_id', 'seat_number', 'quantity', 'total_price', 'status'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }
}
