<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingUserController;   // 🔥 đổi BookingController -> BookingUserController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Đây là nơi đăng ký tất cả các route web cho ứng dụng.
|
*/

// Route công khai
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard với middleware auth & verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Nhóm route auth
Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes
    Route::resource('movies', MovieController::class);
    Route::resource('theaters', TheaterController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('showtimes', ShowtimeController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('customers', CustomerController::class);

});

// Nhóm route customer với middleware auth + role:customer
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {

    // Booking routes
    Route::get('/booking', [BookingUserController::class, 'index'])->name('booking.index');
    Route::get('/booking/{movie}', [BookingUserController::class, 'selectTheater'])->name('booking.theater');
    Route::get('/booking/{movie}/{theater}', [BookingUserController::class, 'selectShowtime'])->name('booking.showtime');
    Route::get('/booking/{showtime}/seats', [BookingUserController::class, 'selectSeats'])->name('booking.seats');
    Route::post('/booking/{showtime}/confirm', [BookingUserController::class, 'confirm'])->name('booking.confirm');

    // Lịch sử đặt vé
    Route::get('/profile/history', [BookingUserController::class, 'history'])->name('history');

});

// Auth routes
require __DIR__.'/auth.php';
