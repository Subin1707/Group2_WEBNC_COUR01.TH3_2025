@extends('layouts.app')

@section('content')
<h1>Thêm phim mới</h1>

<form action="{{ route('movies.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Tiêu đề</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Thể loại</label>
        <input type="text" name="genre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Thời lượng (phút)</label>
        <input type="number" name="duration" class="form-control" required min="1" value="90">
    </div>
    <div class="mb-3">
        <label for="release_date" class="form-label">Ngày phát hành</label>
        <input type="date" name="release_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
