<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'showtime_id',
        'seat_id',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'booking_seat');
    }

}
