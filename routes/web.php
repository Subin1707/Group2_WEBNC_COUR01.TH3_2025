<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BookingController;

//
// Chỉ admin mới vào được
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        return "Trang quản trị Admin";
    });
});

// Chỉ nhân viên bán vé
Route::middleware(['role:staff'])->group(function () {
    Route::get('/staff', function () {
        return "Trang nhân viên bán vé";
    });
});

// Khách hàng
Route::middleware(['role:customer'])->group(function () {
    Route::get('/customer', function () {
        return "Trang khách hàng";
    });
});



Route::get('/', function () {
    return redirect()->route('movies.index');
});

// Quản lý phim
Route::resource('movies', MovieController::class);

// Quản lý rạp
Route::resource('theaters', TheaterController::class);

// Quản lý phòng chiếu
Route::resource('rooms', RoomController::class);

// Quản lý suất chiếu
Route::resource('showtimes', ShowtimeController::class);

// Quản lý vé
Route::resource('tickets', TicketController::class);

// Đặt vé (Booking)
Route::get('/booking', [BookingController::class, 'selectMovie'])->name('booking.selectMovie');
Route::get('/booking/showtimes/{movie_id}', [BookingController::class, 'selectShowtime'])->name('booking.selectShowtime');
Route::get('/booking/seats/{showtime_id}', [BookingController::class, 'selectSeat'])->name('booking.selectSeat');
Route::post('/bookings', [BookingController::class, 'confirmBooking'])->name('bookings.store'); // dùng cho form submit
Route::get('/booking/success', [BookingController::class, 'success'])->name('booking.success');