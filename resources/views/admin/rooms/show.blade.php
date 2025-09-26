@extends('layouts.admin')

@section('title', 'Chi tiết phòng')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">📺 Chi tiết phòng</h1>

    <p><strong>Tên phòng:</strong> {{ $room->name }}</p>
    <p><strong>Rạp:</strong> {{ $room->theater->name ?? 'Chưa xác định' }}</p>
    <p><strong>Tổng số ghế:</strong> {{ $room->total_seats }}</p>

    <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-warning">✏️ Sửa</a>
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
</div>
@endsection
