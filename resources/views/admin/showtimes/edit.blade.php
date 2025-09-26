@extends('layouts.admin')

@section('title', 'Sửa suất chiếu')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">✏️ Sửa suất chiếu</h1>

    <form method="POST" action="{{ route('admin.showtimes.update', $showtime) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Chọn phim</label>
            <select name="movie_id" class="form-select" required>
                <option value="">-- Chọn phim --</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $showtime->movie_id == $movie->id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Chọn phòng</label>
            <select name="room_id" class="form-select" required>
                <option value="">-- Chọn phòng --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $showtime->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->name }} ({{ $room->theater->name ?? 'Chưa xác định' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" class="form-control"
                   value="{{ \Carbon\Carbon::parse($showtime->start_time)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" class="form-control"
                   value="{{ \Carbon\Carbon::parse($showtime->end_time)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá vé (VNĐ)</label>
            <input type="number" name="price" class="form-control" value="{{ $showtime->price }}" required>
        </div>

        <button type="submit" class="btn btn-warning">💾 Cập nhật</button>
        <a href="{{ route('admin.showtimes.index') }}" class="btn btn-secondary">← Quay lại</a>
    </form>
</div>
@endsection
