@extends('layouts.app')

@section('content')
    <h1>Danh sách phim</h1>

    <a href="{{ route('admin.movies.create') }}">➕ Thêm phim mới</a>

    @if($movies->count())
        <ul>
            @foreach($movies as $movie)
                <li>
                    <a href="{{ route('admin.movies.show', $movie->id) }}">
                        {{ $movie->title }}
                    </a>

                    | <a href="{{ route('admin.movies.edit', $movie->id) }}">✏️ Sửa</a>

                    | <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa phim này?')">
                            🗑️ Xóa
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Chưa có phim nào.</p>
    @endif
@endsection
