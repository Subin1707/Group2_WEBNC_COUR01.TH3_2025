<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookingUserController;

// Trang chủ → redirect login chung
Route::get('/', fn() => redirect()->route('login'));

// LOGIN CHUNG
Route::middleware('guest')->group(function () {
    Route::get('/login', [CommonLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CommonLoginController::class, 'login']);
});

// ADMIN
Route::prefix('admin')->name('admin.')->middleware('auth:web')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    Route::resource('movies', MovieController::class);
    Route::resource('theaters', TheaterController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('showtimes', ShowtimeController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('customers', CustomerController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CUSTOMER
Route::prefix('customer')->name('customer.')->middleware('auth:customer')->group(function () {
    Route::get('/dashboard', fn() => view('customer.dashboard'))->name('dashboard');

    Route::get('/booking', [BookingUserController::class, 'index'])->name('booking.index');
    Route::get('/booking/{movie}', [BookingUserController::class, 'selectTheater'])->name('booking.theater');
    Route::get('/booking/{movie}/{theater}', [BookingUserController::class, 'selectShowtime'])->name('booking.showtime');
    Route::get('/booking/{showtime}/seats', [BookingUserController::class, 'selectSeats'])->name('booking.seats');
    Route::post('/booking/{showtime}/confirm', [BookingUserController::class, 'confirm'])->name('booking.confirm');

    Route::get('/profile/history', [BookingUserController::class, 'history'])->name('history');
});

// LOGOUT
Route::post('/logout', [CommonLoginController::class, 'logout'])->name('logout');
