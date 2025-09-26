@extends('layouts.app')

@section('title', 'Chi tiết phim - ' . $movie->title)

@section('content')
<div class="container mt-4">
    <h1>🎬 Chi tiết phim: {{ $movie->title }}</h1>

    <div class="mb-3">
        <p><strong>Tiêu đề:</strong> {{ $movie->title }}</p>
        <p><strong>Mô tả:</strong> {{ $movie->description ?? 'Chưa có mô tả' }}</p>
        <p><strong>Thể loại:</strong> {{ $movie->genre ?? 'Không rõ' }}</p>
        <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
        <p><strong>Ngày khởi chiếu:</strong> 
            {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') : 'Chưa xác định' }}
        </p>
    </div>

    <div class="mb-3">
        <strong>Poster:</strong><br>
        @if($movie->poster)
            <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" width="200">
        @else
            <p>Chưa có poster</p>
        @endif
    </div>

    <a href="{{ route('customer.movies.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách phim</a>
</div>
@endsection
