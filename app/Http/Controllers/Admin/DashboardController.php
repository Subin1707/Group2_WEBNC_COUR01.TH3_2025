<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Room;
use App\Models\Showtime;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'moviesCount'    => Movie::count(),
            'theatersCount'  => Theater::count(),
            'roomsCount'     => Room::count(),
            'showtimesCount' => Showtime::count(),
            'bookingsCount'  => Booking::count(),
        ]);
    }
}
