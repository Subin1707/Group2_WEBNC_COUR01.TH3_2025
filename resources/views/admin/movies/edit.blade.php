@extends('layouts.app')

@section('content')
<h1>Chỉnh sửa phim</h1>

<form action="{{ route('movies.update', $movie->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Tiêu đề</label>
        <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea name="description" class="form-control">{{ $movie->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Thể loại</label>
        <input type="text" name="genre" class="form-control" value="{{ $movie->genre }}" required>
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Thời lượng (phút)</label>
        <input type="number" name="duration" class="form-control" value="{{ $movie->duration }}" required min="1" >
    </div>
    <div class="mb-3">
        <label for="release_date" class="form-label">Ngày phát hành</label>
        <input type="date" name="release_date" class="form-control" value="{{ $movie->release_date }}" required>
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
