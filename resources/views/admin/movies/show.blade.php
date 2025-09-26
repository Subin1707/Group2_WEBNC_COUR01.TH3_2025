@extends('layouts.admin')

@section('title', 'Chi tiết phim - ' . $movie->title)

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🎬 Chi tiết phim: {{ $movie->title }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Tiêu đề:</strong> {{ $movie->title }}</p>
            <p><strong>Mô tả:</strong> {{ $movie->description ?? 'Chưa có mô tả' }}</p>
            <p><strong>Thể loại:</strong> {{ $movie->genre ?? 'Không rõ' }}</p>
            <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
            <p><strong>Ngày khởi chiếu:</strong> 
                {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') : 'Chưa xác định' }}
            </p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Poster:</strong></p>
            @if($movie->poster)
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" width="200">
            @else
                <p>Chưa có poster</p>
            @endif
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-primary">✏️ Sửa phim</a>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
    </div>
</div>
@endsection
