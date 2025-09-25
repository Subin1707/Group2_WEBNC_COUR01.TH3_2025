<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Hiển thị form đặt vé
    public function create($showtimeId)
    {
        $showtime = Showtime::findOrFail($showtimeId);
        return view('customer.booking.create', compact('showtime'));
    }

    // Lưu vé mới
    public function store(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id' => 'required|exists:seats,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Booking::create([
            'user_id' => Auth::id(), // dùng user_id thay vì customer_id
            'showtime_id' => $request->showtime_id,
            'seat_id' => $request->seat_id,
            'quantity' => $request->quantity,
            'total_price' => $request->quantity * $request->price, // giá tính theo request
            'status' => 'pending',
        ]);

        return redirect()->route('customer.history')->with('success', 'Đặt vé thành công!');
    }

    // Lịch sử đặt vé
    public function history()
    {
        $bookings = Booking::with('showtime.movie', 'showtime.room.theater')
            ->where('user_id', Auth::id()) // dùng user_id thay vì customer_id
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.booking.history', compact('bookings'));
    }
}
