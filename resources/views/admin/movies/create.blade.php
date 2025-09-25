@extends('layouts.app')

@section('content')
    <h1>Thêm phim mới</h1>

    <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Tiêu đề:</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required><br><br>

        <label>Mô tả:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Thể loại:</label><br>
        <input type="text" name="genre" value="{{ old('genre') }}"><br><br>

        <label>Thời lượng (phút):</label><br>
        <input type="number" name="duration" value="{{ old('duration', 90) }}" min="1"><br><br>

        <label>Ngày khởi chiếu:</label><br>
        <input type="date" name="release_date" value="{{ old('release_date') }}"><br><br>

        <label>Poster:</label><br>
        <input type="file" name="poster"><br><br>

        <button type="submit">💾 Lưu</button>
        <a href="{{ route('admin.movies.index') }}">⬅️ Quay lại</a>
    </form>
@endsection
