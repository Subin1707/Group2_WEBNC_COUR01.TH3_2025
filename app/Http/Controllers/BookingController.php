<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Showtime;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'showtime', 'seat'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $customers = Customer::all();
        $showtimes = Showtime::all();
        $seats = Seat::all();
        return view('bookings.create', compact('customers', 'showtimes', 'seats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id' => 'required|exists:seats,id',
            'status' => 'required|in:reserved,paid,cancelled',
        ]);

        Booking::create($request->all());
        return redirect()->route('bookings.index')->with('success', 'Đặt vé thành công 🎉');
    }

    public function edit(Booking $booking)
    {
        $customers = Customer::all();
        $showtimes = Showtime::all();
        $seats = Seat::all();
        return view('bookings.edit', compact('booking', 'customers', 'showtimes', 'seats'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id' => 'required|exists:seats,id',
            'status' => 'required|in:reserved,paid,cancelled',
        ]);

        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Cập nhật vé thành công 🚀');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Xóa vé thành công 🗑️');
    }
}
