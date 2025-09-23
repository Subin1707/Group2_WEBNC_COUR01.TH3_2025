<?php

namespace App\Http\Controllers;

use App\Models\BookingUser;
use App\Models\Customer;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingUserController extends Controller
{
    // Xem danh sách phim
    public function movies()
    {
        $movies = Movie::all();
        return view('customer.movies', compact('movies'));
    }

    // Xem các suất chiếu của 1 phim
    public function showtimes(Movie $movie)
    {
        // Đảm bảo Movie có quan hệ hasMany(Showtime::class)
        $showtimes = $movie->showtimes()->get();
        return view('customer.showtimes', compact('movie', 'showtimes'));
    }

    // Xem ghế trống
    public function seats(Showtime $showtime)
    {
        $seats = Seat::all();
        $bookedSeats = BookingUser::where('showtime_id', $showtime->id)
            ->pluck('seat_id')
            ->toArray();

        return view('customer.seats', compact('showtime', 'seats', 'bookedSeats'));
    }

    // Đặt vé
    public function store(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id'     => 'required|exists:seats,id',
        ]);

        // Nếu bạn đang login bằng guard 'customer'
        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập trước khi đặt vé!');
        }

        // Check nếu ghế đã có người đặt
        $exists = BookingUser::where('showtime_id', $request->showtime_id)
            ->where('seat_id', $request->seat_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Ghế này đã được đặt rồi!');
        }

        BookingUser::create([
            'customer_id' => $customerId,
            'showtime_id' => $request->showtime_id,
            'seat_id'     => $request->seat_id,
            'status'      => 'reserved',
        ]);

        return redirect()->route('customer.bookings.history')->with('success', 'Đặt vé thành công!');
    }

    // Lịch sử đặt vé
    public function history()
    {
        $customerId = Auth::guard('customer')->id();

        $bookings = BookingUser::where('customer_id', $customerId)
            ->with(['showtime.movie', 'seat'])
            ->latest()
            ->get();

        return view('customer.history', compact('bookings'));
    }
}
