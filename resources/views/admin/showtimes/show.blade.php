@extends('layouts.admin')

@section('title', 'Chi tiết suất chiếu')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🕒 Chi tiết suất chiếu</h1>

    <p><strong>Phim:</strong> {{ $showtime->movie->title }}</p>
    <p><strong>Phòng:</strong> {{ $showtime->room->name }} ({{ $showtime->room->theater->name ?? 'Chưa xác định' }})</p>
    <p><strong>Bắt đầu:</strong> {{ $showtime->start_time }}</p>
    <p><strong>Kết thúc:</strong> {{ $showtime->end_time }}</p>
    <p><strong>Giá vé:</strong> {{ number_format($showtime->price) }} đ</p>

    <br>
    <a href="{{ route('admin.showtimes.edit', $showtime) }}" class="btn btn-warning">✏️ Sửa</a>
    <a href="{{ route('admin.showtimes.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
</div>
@endsection
