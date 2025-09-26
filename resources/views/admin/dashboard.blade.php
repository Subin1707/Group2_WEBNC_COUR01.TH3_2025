@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<h1>📊 Dashboard</h1>
<div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
            <h5>🎞️ Movies</h5>
            <p class="fs-3">{{ $moviesCount }}</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
            <h5>🏢 Theaters</h5>
            <p class="fs-3">{{ $theatersCount }}</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
            <h5>📺 Rooms</h5>
            <p class="fs-3">{{ $roomsCount }}</p>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
            <h5>🕒 Showtimes</h5>
            <p class="fs-3">{{ $showtimesCount }}</p>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3 mb-3">
        <div class="card text-center p-3">
            <h5>🎫 Bookings</h5>
            <p class="fs-3">{{ $bookingsCount }}</p>
        </div>
    </div>
</div>
@endsection
