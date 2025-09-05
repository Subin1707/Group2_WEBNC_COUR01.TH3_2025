<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater_id',
        'name',
        'type',
        'total_seats',
    ];

    /**
     * Mỗi phòng thuộc về một rạp chiếu.
     */
    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    /**
     * Mỗi phòng có nhiều suất chiếu.
     */
    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'room_id');
    }
}
