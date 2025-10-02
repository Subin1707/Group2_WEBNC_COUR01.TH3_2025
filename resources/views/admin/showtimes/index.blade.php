@extends('layouts.app')

@section('title', 'Danh sách suất chiếu')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🕒 Danh sách suất chiếu</h1>

    <a href="{{ route('admin.showtimes.create') }}" class="btn btn-primary mb-3">+ Thêm suất chiếu</a>

    @if($showtimes->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
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
                            <td>{{ $showtime->room->name }} ({{ $showtime->room->theater->name ?? 'Chưa xác định' }})</td>
                            <td>{{ $showtime->start_time }}</td>
                            <td>{{ $showtime->end_time }}</td>
                            <td>{{ number_format($showtime->price) }} đ</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.showtimes.show', $showtime) }}" class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('admin.showtimes.edit', $showtime) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('admin.showtimes.destroy', $showtime) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa suất chiếu này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Chưa có suất chiếu nào.</p>
    @endif
</div>
@endsection
