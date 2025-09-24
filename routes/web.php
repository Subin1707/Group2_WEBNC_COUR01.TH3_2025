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
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Admin login (Laravel Breeze/Jetstream)

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ========================= PUBLIC ROUTES =========================
// Trang chủ => login customer
Route::get('/', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');

// ========================= ADMIN ROUTES =========================
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest admin
    Route::middleware('guest:web')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    });

    // Authenticated admin
    Route::middleware('auth:web')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

        // CRUD quản lý
        Route::resource('movies', MovieController::class);
        Route::resource('theaters', TheaterController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('showtimes', ShowtimeController::class);
        Route::resource('tickets', TicketController::class);
        Route::resource('customers', CustomerController::class);

        // Profile admin
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Logout admin
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});

// ========================= CUSTOMER ROUTES =========================
Route::prefix('customer')->name('customer.')->group(function () {
    // Guest customer
    Route::middleware('guest:customer')->group(function () {
        Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [CustomerAuthController::class, 'login']);

        Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [CustomerAuthController::class, 'register']);

        Route::get('/forgot-password', [CustomerAuthController::class, 'showForgotPasswordForm'])->name('password.request');
        Route::post('/forgot-password', [CustomerAuthController::class, 'sendResetLink'])->name('password.email');

        Route::get('/reset-password/{token}', [CustomerAuthController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('/reset-password', [CustomerAuthController::class, 'resetPassword'])->name('password.update');
    });

    // Authenticated customer
    Route::middleware('auth:customer')->group(function () {
        Route::get('/dashboard', fn () => view('customer.dashboard'))->name('dashboard');

        // Booking flow
        Route::get('/booking', [BookingUserController::class, 'index'])->name('booking.index');
        Route::get('/booking/{movie}', [BookingUserController::class, 'selectTheater'])->name('booking.theater');
        Route::get('/booking/{movie}/{theater}', [BookingUserController::class, 'selectShowtime'])->name('booking.showtime');
        Route::get('/booking/{showtime}/seats', [BookingUserController::class, 'selectSeats'])->name('booking.seats');
        Route::post('/booking/{showtime}/confirm', [BookingUserController::class, 'confirm'])->name('booking.confirm');

        // History
        Route::get('/profile/history', [BookingUserController::class, 'history'])->name('history');

        // Logout
        Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
    });
});

// ========================= AUTH ROUTES (Admin mặc định) =========================
require __DIR__.'/auth.php';
