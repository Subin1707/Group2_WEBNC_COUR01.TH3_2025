<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $customerId = Auth::guard('customer')->id();

        $totalBookings = Booking::where('user_id', $customerId)->count();

        $recentBookings = Booking::with('showtime.movie', 'showtime.room', 'seat')
                                 ->where('user_id', $customerId)
                                 ->latest()
                                 ->take(5)
                                 ->get();

        $totalMovies = Movie::count();

        return view('customer.dashboard', compact('totalBookings', 'recentBookings', 'totalMovies'));
    }
}
