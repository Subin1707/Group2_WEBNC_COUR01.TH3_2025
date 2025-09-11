<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'showtime_id',
        'total_tickets',
        'total_price',
        'status',
    ];

    // Booking thuộc về 1 suất chiếu
    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    // Nếu có user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Booking có nhiều vé (tickets)
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
