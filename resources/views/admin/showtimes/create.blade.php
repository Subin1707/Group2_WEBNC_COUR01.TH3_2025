@extends('layouts.admin')

@section('title', 'Thêm suất chiếu mới')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">➕ Thêm suất chiếu mới</h1>

    <form method="POST" action="{{ route('admin.showtimes.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Chọn phim</label>
            <select name="movie_id" class="form-select" required>
                <option value="">-- Chọn phim --</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Chọn phòng</label>
            <select name="room_id" class="form-select" required>
                <option value="">-- Chọn phòng --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }} ({{ $room->theater->name ?? 'Chưa xác định' }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá vé (VNĐ)</label>
            <input type="number" name="price" class="form-control" value="100000" required>
        </div>

        <button type="submit" class="btn btn-success">✅ Thêm suất chiếu</button>
        <a href="{{ route('admin.showtimes.index') }}" class="btn btn-secondary">← Quay lại</a>
    </form>
</div>
@endsection
