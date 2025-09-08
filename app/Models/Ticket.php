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

    // Quan hệ: vé thuộc 1 suất chiếu
    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }
}
