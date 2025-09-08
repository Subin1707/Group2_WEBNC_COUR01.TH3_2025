@extends('layouts.app')

@section('content')
<div class="container">
    <h2>✏ Sửa Suất chiếu</h2>

    <form action="{{ route('showtimes.update', $showtime) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Phim</label>
            <select name="movie_id" class="form-control" required>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $showtime->movie_id == $movie->id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Phòng</label>
            <select name="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $showtime->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" class="form-control"
                   value="{{ date('Y-m-d\TH:i', strtotime($showtime->start_time)) }}" required>
        </div>
        <div class="mb-3">
            <label>Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" class="form-control"
                   value="{{ date('Y-m-d\TH:i', strtotime($showtime->end_time)) }}" required>
        </div>
        <div class="mb-3">
            <label>Giá vé</label>
            <input type="number" step="1000" name="price" class="form-control" value="{{ $showtime->price }}" required>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
