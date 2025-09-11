<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Ticket;

class BookingController extends Controller
{
    // B1: Chọn phim
    public function selectMovie()
    {
        $movies = Movie::all();
        return view('booking.select-movie', compact('movies'));
    }

    // B2: Chọn suất chiếu theo phim
    public function selectShowtime($movie_id)
    {
        $showtimes = Showtime::where('movie_id', $movie_id)->get();
        return view('booking.select-showtime', compact('showtimes', 'movie_id'));
    }

    // B3: Chọn ghế (giả sử tickets lưu ghế)
    public function selectSeat($showtime_id)
    {
        $tickets = Ticket::where('showtime_id', $showtime_id)->get();
        return view('booking.select-seat', compact('tickets', 'showtime_id'));
    }

    // B4: Xác nhận đặt vé
    public function confirmBooking(Request $request)
    {
        // ở đây bạn có thể lưu booking hoặc ticket
        $ticket = Ticket::find($request->ticket_id);
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found!');
        }
        $ticket->user_id = 1;  //auth()->id();
        $ticket->status = 'booked';
        $ticket->save();

        return redirect()->route('booking.success');
    }

    public function success()
    {
        return view('booking.success');
    }
}
