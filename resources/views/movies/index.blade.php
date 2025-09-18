@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Danh sách phim</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">Thêm phim</a>
</div>

<form method="GET" action="{{ route('movies.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control"
               placeholder="Tìm kiếm phim..." value="{{ request('search') }}">
        <button class="btn btn-outline-secondary" type="submit">Tìm</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Thể loại</th>
            <th>Ngày phát hành</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>
                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" 
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Không có phim nào</td>
            </tr>
        @endforelse
    </tbody>
</table>

 {{-- Phân trang Bootstrap 5 --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $movies->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
@endsection
