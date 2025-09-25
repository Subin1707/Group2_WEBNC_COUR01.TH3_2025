<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    // Hiển thị danh sách booking
    public function index()
    {
        $bookings = Booking::with('user', 'showtime.movie', 'showtime.room.theater', 'seat')
            ->latest()
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Cập nhật trạng thái booking
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Cập nhật trạng thái booking thành công!');
    }

    // Xóa booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Xóa booking thành công!');
    }
}
