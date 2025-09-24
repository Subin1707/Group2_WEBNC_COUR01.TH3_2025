<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\CommonLoginController;

// ==================== AUTH ====================
// Trang chủ => login chung
Route::get('/', [CommonLoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [CommonLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [CommonLoginController::class, 'logout'])->name('logout');

// ==================== ADMIN DASHBOARD ====================
Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resources([
        'movies'    => MovieController::class,
        'theaters'  => TheaterController::class,
        'rooms'     => RoomController::class,
        'seats'     => SeatController::class,
        'showtimes' => ShowtimeController::class,
        'bookings'  => BookingController::class,
    ]);
});

// ==================== CUSTOMER DASHBOARD ====================
Route::middleware(['auth:customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

    // Khách hàng chỉ xem và đặt vé
    Route::get('/movies', [MovieController::class, 'index'])->name('customer.movies.index');
    Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('customer.movies.show');

    Route::get('/showtimes/{movie}', [ShowtimeController::class, 'index'])->name('customer.showtimes.index');

    Route::get('/booking/{showtime}', [BookingController::class, 'create'])->name('customer.booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('customer.booking.store');
});
