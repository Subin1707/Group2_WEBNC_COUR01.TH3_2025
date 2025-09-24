@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm suất chiếu mới</h1>
    <form method="POST" action="{{ route('showtimes.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Phim</label>
            <select name="movie_id" class="form-control" required>
                <option value="">-- Chọn phim --</option>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Phòng</label>
            <select name="room_id" class="form-control" required>
                <option value="">-- Chọn phòng --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
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
            <label class="form-label">Giá vé</label>
            <input type="number" name="price" class="form-control" value="50000" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
