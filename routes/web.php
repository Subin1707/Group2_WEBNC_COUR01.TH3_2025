<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route công khai
Route::get('/', function () {
    return view('welcome'); // 👈 có thể để trang landing page
});

// Dashboard chung (sẽ redirect theo role)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ========================= ADMIN ROUTES =========================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD quản lý
    Route::resource('movies', MovieController::class);
    Route::resource('theaters', TheaterController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('showtimes', ShowtimeController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('customers', CustomerController::class);
});

// ========================= CUSTOMER ROUTES =========================
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    // Customer dashboard
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    // Booking flow
    Route::get('/booking', [BookingUserController::class, 'index'])->name('booking.index');
    Route::get('/booking/{movie}', [BookingUserController::class, 'selectTheater'])->name('booking.theater');
    Route::get('/booking/{movie}/{theater}', [BookingUserController::class, 'selectShowtime'])->name('booking.showtime');
    Route::get('/booking/{showtime}/seats', [BookingUserController::class, 'selectSeats'])->name('booking.seats');
    Route::post('/booking/{showtime}/confirm', [BookingUserController::class, 'confirm'])->name('booking.confirm');

    // Lịch sử đặt vé
    Route::get('/profile/history', [BookingUserController::class, 'history'])->name('history');
});

// ========================= PROFILE ROUTES (chung) =========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
