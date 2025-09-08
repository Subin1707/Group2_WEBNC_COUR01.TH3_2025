@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Suất chiếu</h1>

    <form method="GET" action="{{ route('showtimes.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm phim hoặc phòng..."
               class="form-control w-25 d-inline">
        <button class="btn btn-secondary">🔍 Tìm</button>
        <a href="{{ route('showtimes.index') }}" class="btn btn-light">❌ Reset</a>
    </form>

    <a href="{{ route('showtimes.create') }}" class="btn btn-primary mb-3">➕ Thêm suất chiếu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Phim</th>
                <th>Phòng</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Giá vé</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($showtimes as $showtime)
            <tr>
                <td>{{ $showtime->id }}</td>
                <td>{{ $showtime->movie->title ?? 'N/A' }}</td>
                <td>{{ $showtime->room->name ?? 'N/A' }}</td>
                <td>{{ $showtime->start_time }}</td>
                <td>{{ $showtime->end_time }}</td>
                <td>{{ number_format($showtime->price, 0, ',', '.') }} đ</td>
                <td>
                    <a href="{{ route('showtimes.show', $showtime) }}" class="btn btn-info btn-sm">👁</a>
                    <a href="{{ route('showtimes.edit', $showtime) }}" class="btn btn-warning btn-sm">✏</a>
                    <form action="{{ route('showtimes.destroy', $showtime) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa?')">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">Chưa có suất chiếu</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $showtimes->links() }}
</div>
@endsection
