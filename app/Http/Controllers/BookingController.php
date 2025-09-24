<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showtime;
use App\Models\Seat;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['showtime.movie', 'seat', 'user', 'customer'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $showtimes = Showtime::with('movie')->get();
        $seats     = Seat::where('status', 'available')->get();
        $users     = User::all();
        $customers = Customer::all();

        return view('bookings.create', compact('showtimes', 'seats', 'users', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id'     => 'required|exists:seats,id',
            'user_id'     => 'nullable|exists:users,id',
            'customer_id' => 'nullable|exists:customers,id',
            'total_price' => 'required|numeric|min:0',
        ]);

        // update seat status = booked
        $seat = Seat::findOrFail($validated['seat_id']);
        if ($seat->status === 'booked') {
            return back()->withErrors(['seat_id' => 'Ghế này đã được đặt!']);
        }
        $seat->update(['status' => 'booked']);

        Booking::create($validated);

        return redirect()->route('bookings.index')->with('success', 'Đặt vé thành công!');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $showtimes = Showtime::with('movie')->get();
        $seats     = Seat::all();
        $users     = User::all();
        $customers = Customer::all();

        return view('bookings.edit', compact('booking', 'showtimes', 'seats', 'users', 'customers'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id'     => 'required|exists:seats,id',
            'user_id'     => 'nullable|exists:users,id',
            'customer_id' => 'nullable|exists:customers,id',
            'total_price' => 'required|numeric|min:0',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Cập nhật vé thành công!');
    }

    public function destroy(Booking $booking)
    {
        // Trả lại ghế thành available
        if ($booking->seat) {
            $booking->seat->update(['status' => 'available']);
        }

        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Xóa vé thành công!');
    }
}
