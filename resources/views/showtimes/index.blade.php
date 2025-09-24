@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách suất chiếu</h1>
    <a href="{{ route('showtimes.create') }}" class="btn btn-primary">+ Thêm suất chiếu</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Phim</th>
                <th>Phòng</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Giá vé</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($showtimes as $showtime)
                <tr>
                    <td>{{ $showtime->movie->title }}</td>
                    <td>{{ $showtime->room->name }}</td>
                    <td>{{ $showtime->start_time }}</td>
                    <td>{{ $showtime->end_time }}</td>
                    <td>{{ number_format($showtime->price) }} đ</td>
                    <td>
                        <a href="{{ route('showtimes.show', $showtime) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('showtimes.edit', $showtime) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('showtimes.destroy', $showtime) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa suất chiếu này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
