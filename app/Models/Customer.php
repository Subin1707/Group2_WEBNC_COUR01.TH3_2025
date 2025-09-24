<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // để dùng Auth
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customers'; // bảng trong DB

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token', // ẩn khi json
    ];

    /**
     * Quan hệ 1-n: Customer có nhiều Booking
     */
    public function bookings()
    {
        return $this->hasMany(BookingUser::class, 'customer_id');
    }
}
