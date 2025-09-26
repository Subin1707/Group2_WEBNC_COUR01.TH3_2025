<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Hiển thị form đặt vé chi tiết
    public function create($showtimeId)
    {
        $showtime = Showtime::with('movie', 'room')->findOrFail($showtimeId);
        return view('customer.booking.create', compact('showtime'));
    }

    // Lưu vé mới
    public function store(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seats'       => 'required|array',
            'seats.*'     => 'required|integer|min:1',
        ]);

        $showtime = Showtime::findOrFail($request->showtime_id);
        $pricePerSeat = $showtime->price ?? 100000;

        foreach ($request->seats as $seatNumber) {
            Booking::create([
                'user_id'     => Auth::id(),
                'showtime_id' => $showtime->id,
                'seat_number' => $seatNumber,
                'quantity'    => 1,
                'total_price' => $pricePerSeat,
                'status'      => 'pending',
            ]);
        }

        return redirect()->route('customer.history')
                         ->with('success', 'Đặt vé thành công!');
    }

    // Lịch sử đặt vé
    public function history()
    {
        $bookings = Booking::with('showtime.movie', 'showtime.room.theater')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.booking.history', compact('bookings'));
    }
}
