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
            'seat_number' => 'required|string|max:10',
        ]);

        Booking::create([
            'customer_id' => Auth::guard('customer')->id(),
            'showtime_id' => $request->showtime_id,
            'seat_number' => $request->seat_number,
            'status' => 'booked',
        ]);

        return redirect()->route('customer.history')->with('success', 'Đặt vé thành công!');
    }

    // Lịch sử đặt vé
    public function history()
    {
        $bookings = Booking::with('showtime.movie', 'showtime.room.theater')
            ->where('customer_id', Auth::guard('customer')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.booking.history', compact('bookings'));
    }
}
