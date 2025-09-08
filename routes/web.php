<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;

// Trang chủ -> điều hướng về movies
Route::get('/', function () {
    return redirect()->route('movies.index');
});

// Group cho Admin Management
Route::prefix('admin')->name('admin.')->group(function () {
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
});
