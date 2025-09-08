@extends('layouts.app')

@section('content')
<div class="container">
    <h2>👁 Chi tiết Suất chiếu</h2>

    <p><strong>ID:</strong> {{ $showtime->id }}</p>
    <p><strong>Phim:</strong> {{ $showtime->movie->title ?? 'N/A' }}</p>
    <p><strong>Phòng:</strong> {{ $showtime->room->name ?? 'N/A' }}</p>
    <p><strong>Bắt đầu:</strong> {{ $showtime->start_time }}</p>
    <p><strong>Kết thúc:</strong> {{ $showtime->end_time }}</p>
    <p><strong>Giá vé:</strong> {{ number_format($showtime->price, 0, ',', '.') }} đ</p>

    <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
</div>
@endsection
