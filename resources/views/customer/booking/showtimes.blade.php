@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📅 Suất chiếu - {{ $movie->title }}</h2>
    <ul class="list-group">
        @foreach($showtimes as $showtime)
            <li class="list-group-item d-flex justify-content-between">
                <span>Rạp: {{ $showtime->room->theater->name }} | Phòng: {{ $showtime->room->name }}</span>
                <span>⏰ {{ $showtime->start_time }}</span>
                <a href="{{ route('booking.seats', $showtime->id) }}" class="btn btn-sm btn-success">Chọn ghế</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
