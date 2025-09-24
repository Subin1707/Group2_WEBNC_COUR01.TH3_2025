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

// ----------------------------------------------------
// Trang chủ → redirect login chung
// ----------------------------------------------------
Route::get('/', function () {
    return redirect()->route('login');
});

// ----------------------------------------------------
// LOGIN CHUNG (chỉ cho guest chưa đăng nhập)
// ----------------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('/login', [CommonLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CommonLoginController::class, 'login']);
});

// ----------------------------------------------------
// ADMIN
// ----------------------------------------------------
Route::prefix('admin')->name('admin.')->middleware('auth:web')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    Route::resource('movies', MovieController::class);
    Route::resource('theaters', TheaterController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('showtimes', ShowtimeController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('customers', CustomerController::class);

    // Profile cho admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------------------------------
// CUSTOMER
// ----------------------------------------------------
Route::prefix('customer')->name('customer.')->middleware('auth:customer')->group(function () {
    Route::get('/dashboard', fn() => view('customer.dashboard'))->name('dashboard');

    // Booking flow
    Route::get('/booking', [BookingUserController::class, 'index'])->name('booking.index');
    Route::get('/booking/{movie}', [BookingUserController::class, 'selectTheater'])->name('booking.theater');
    Route::get('/booking/{movie}/{theater}', [BookingUserController::class, 'selectShowtime'])->name('booking.showtime');
    Route::get('/booking/{showtime}/seats', [BookingUserController::class, 'selectSeats'])->name('booking.seats');
    Route::post('/booking/{showtime}/confirm', [BookingUserController::class, 'confirm'])->name('booking.confirm');

    // Lịch sử đặt vé
    Route::get('/profile/history', [BookingUserController::class, 'history'])->name('history');

    // Profile cho customer
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------------------------------
// LOGOUT (cho cả admin & customer)
// ----------------------------------------------------
Route::post('/logout', [CommonLoginController::class, 'logout'])
    ->middleware(['auth:web', 'auth:customer']) // tránh user chưa login gọi logout
    ->name('logout');
