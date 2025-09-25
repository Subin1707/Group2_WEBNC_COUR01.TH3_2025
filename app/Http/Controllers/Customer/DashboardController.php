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
        $customer = Auth::guard('customer')->user();

        return view('customer.dashboard', [
            'totalBookings' => Booking::where('customer_id', $customer->id)->count(),
            'recentBookings' => Booking::with('showtime.movie', 'showtime.room')
                                      ->where('customer_id', $customer->id)
                                      ->latest()
                                      ->take(5)
                                      ->get(),
            'totalMovies' => Movie::count(),
        ]);
    }
}

