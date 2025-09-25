<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'showtime_id',
        'seat_number',
        'price',
        'status',
    ];

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }
}
