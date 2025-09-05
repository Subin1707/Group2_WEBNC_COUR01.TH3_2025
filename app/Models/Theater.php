<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    // Các cột cho phép gán dữ liệu hàng loạt (mass assignment)
    protected $fillable = [
        'name',
        'address',
        'region',
        'phone',
    ];

    /**
     * Quan hệ: 1 rạp có nhiều phòng (rooms).
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
