<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShowtimeController;

// Auth
use App\Http\Controllers\Auth\CommonLoginController;
use App\Http\Controllers\Auth\CommonRegisterController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AdminBookingController;

// Customer Controllers
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [CommonLoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [CommonLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [CommonLoginController::class, 'logout'])->name('logout');

Route::get('/register', [CommonRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CommonRegisterController::class, 'register'])->name('register.submit');

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD + RESOURCE ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:web'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'movies'    => MovieController::class,
        'theaters'  => TheaterController::class,
        'rooms'     => RoomController::class,
        'showtimes' => ShowtimeController::class,
    ]);

    // Admin booking routes
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');
});

/*
|--------------------------------------------------------------------------
| CUSTOMER DASHBOARD + BOOKING + MOVIES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:customer'])->prefix('customer')->name('customer.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

    // Booking routes
    Route::get('/booking', [CustomerBookingController::class, 'showBookingForm'])->name('booking.form');
    Route::get('/booking/{showtime}', [CustomerBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [CustomerBookingController::class, 'store'])->name('booking.store');
    Route::get('/history', [CustomerBookingController::class, 'history'])->name('history');

    // Movies
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
});
