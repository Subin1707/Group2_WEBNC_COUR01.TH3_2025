<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowtimeController;

// Auth
use App\Http\Controllers\Auth\CommonLoginController;

// Booking Controllers
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;

// Dashboard Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [CommonLoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [CommonLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [CommonLoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD + RESOURCE ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:web'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard với thống kê
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Resource routes: quản lý dữ liệu
    Route::resources([
        'movies'    => MovieController::class,
        'theaters'  => TheaterController::class,
        'rooms'     => RoomController::class,
        'seats'     => SeatController::class,
        'showtimes' => ShowtimeController::class,
        'bookings'  => AdminBookingController::class, // admin quản lý booking
    ]);
});

/*
|--------------------------------------------------------------------------
| CUSTOMER DASHBOARD + BOOKING + MOVIES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:customer'])->prefix('customer')->name('customer.')->group(function () {

    // Dashboard Customer
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

    // Booking routes
    Route::get('/booking/{showtime}', [CustomerBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [CustomerBookingController::class, 'store'])->name('booking.store');
    Route::get('/history', [CustomerBookingController::class, 'history'])->name('history');

    // Movies + Showtimes
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
    Route::get('/showtimes/{movie}', [ShowtimeController::class, 'index'])->name('showtimes.index');
});
