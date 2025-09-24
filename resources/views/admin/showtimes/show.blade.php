@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết suất chiếu</h1>
    <p><strong>Phim:</strong> {{ $showtime->movie->title }}</p>
    <p><strong>Phòng:</strong> {{ $showtime->room->name }}</p>
    <p><strong>Thời gian bắt đầu:</strong> {{ $showtime->start_time }}</p>
    <p><strong>Thời gian kết thúc:</strong> {{ $showtime->end_time }}</p>
    <p><strong>Giá vé:</strong> {{ number_format($showtime->price) }} đ</p>
    <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
