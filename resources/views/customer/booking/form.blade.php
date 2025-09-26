@extends('layouts.app')

@section('title', 'Chọn Suất Chiếu')

@section('content')
<div class="container">
    <h1>🎬 Chọn suất chiếu</h1>

    @if($showtimes->count())
        <div class="list-group">
            @foreach($showtimes as $showtime)
                <a href="{{ route('customer.booking.create', $showtime->id) }}" class="list-group-item list-group-item-action">
                    {{ $showtime->movie->title }} - {{ $showtime->room->name }} ({{ $showtime->start_time }})
                </a>
            @endforeach
        </div>
    @else
        <p>Chưa có suất chiếu nào.</p>
    @endif

    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary mt-3">⬅️ Quay lại Dashboard</a>
</div>
@endsection
