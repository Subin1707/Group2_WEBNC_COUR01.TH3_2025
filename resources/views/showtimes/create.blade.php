@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ Thêm Suất chiếu</h2>

    <form action="{{ route('showtimes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Phim</label>
            <select name="movie_id" class="form-control" required>
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Phòng</label>
            <select name="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Giá vé</label>
            <input type="number" step="1000" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
