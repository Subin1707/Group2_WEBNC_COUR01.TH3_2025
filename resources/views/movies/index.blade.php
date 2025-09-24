@extends('layouts.app')

@section('content')
    <h1>Danh sách phim</h1>

    <a href="{{ route('movies.create') }}">➕ Thêm phim mới</a>

    @if($movies->count())
        <ul>
            @foreach($movies as $movie)
                <li>
                    <a href="{{ route('movies.show', $movie->id) }}">
                        {{ $movie->title }}
                    </a>

                    | <a href="{{ route('movies.edit', $movie->id) }}">✏️ Sửa</a>

                    | <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
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
