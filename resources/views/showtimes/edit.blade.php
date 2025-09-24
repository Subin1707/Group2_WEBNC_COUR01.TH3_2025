@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa suất chiếu</h1>
    <form method="POST" action="{{ route('showtimes.update', $showtime) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Phim</label>
            <select name="movie_id" class="form-control" required>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $showtime->movie_id == $movie->id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Phòng</label>
            <select name="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $showtime->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" value="{{ \Carbon\Carbon::parse($showtime->start_time)->format('Y-m-d\TH:i') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" value="{{ \Carbon\Carbon::parse($showtime->end_time)->format('Y-m-d\TH:i') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá vé</label>
            <input type="number" name="price" class="form-control" value="{{ $showtime->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
