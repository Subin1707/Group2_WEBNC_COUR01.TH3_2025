@extends('layouts.app')

@section('title', 'Chọn Suất Chiếu')

@section('content')
<h1 class="mb-4">Chọn Suất Chiếu</h1>
<div class="list-group">
    @foreach($showtimes as $showtime)
        <a href="{{ route('booking.selectSeat', $showtime->id) }}" class="list-group-item list-group-item-action">
            {{ $showtime->time }}
        </a>
    @endforeach
</div>
<a href="{{ route('booking.selectMovie') }}" class="btn btn-link mt-3">← Quay lại chọn phim</a>
@endsection
