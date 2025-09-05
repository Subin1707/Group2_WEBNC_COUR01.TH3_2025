<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'theater_id',
        'name',
        'type',
        'total_seats',
    ];

    // Mỗi phòng thuộc 1 rạp
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    // Mỗi phòng có nhiều suất chiếu
    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}
