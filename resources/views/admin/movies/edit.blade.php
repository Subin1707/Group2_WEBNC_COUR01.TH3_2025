@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa phim: {{ $movie->title }}</h1>

    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Tiêu đề:</label><br>
        <input type="text" name="title" value="{{ old('title', $movie->title) }}" required><br><br>

        <label>Mô tả:</label><br>
        <textarea name="description">{{ old('description', $movie->description) }}</textarea><br><br>

        <label>Thể loại:</label><br>
        <input type="text" name="genre" value="{{ old('genre', $movie->genre) }}"><br><br>

        <label>Thời lượng (phút):</label><br>
        <input type="number" name="duration" value="{{ old('duration', $movie->duration) }}" min="1"><br><br>

        <label>Ngày khởi chiếu:</label><br>
        <input type="date" name="release_date" value="{{ old('release_date', $movie->release_date) }}"><br><br>

        <label>Poster hiện tại:</label><br>
        @if($movie->poster)
            <img src="{{ asset('storage/'.$movie->poster) }}" alt="Poster" width="150"><br>
        @else
            <p>Chưa có poster</p>
        @endif
        <br>

        <label>Cập nhật Poster mới:</label><br>
        <input type="file" name="poster"><br><br>

        <button type="submit">💾 Cập nhật</button>
        <a href="{{ route('admin.movies.index') }}">⬅️ Quay lại</a>
    </form>
@endsection
