@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
<div class="container">
    <h1>🎟️ Customer Dashboard</h1>
    <p>Xin chào, <strong>{{ Auth::guard('customer')->user()->name }}</strong></p>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">🎫 Tổng số booking</h5>
                    <p class="card-text fs-3">{{ $totalBookings }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">🎞️ Tổng số phim</h5>
                    <p class="card-text fs-3">{{ $totalMovies }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">🕒 Booking gần đây</h5>
                    <ul class="list-group list-group-flush">
                        @forelse($recentBookings as $booking)
                            <li class="list-group-item">
                                {{ $booking->showtime->movie->title }} - Ghế {{ $booking->seat_number ?? $booking->seat_id }} 
                                ({{ $booking->showtime->start_time }})
                            </li>
                        @empty
                            <li class="list-group-item">Chưa có booking nào</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
