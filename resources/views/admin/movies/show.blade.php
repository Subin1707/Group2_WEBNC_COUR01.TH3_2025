@extends('layouts.app')

@section('content')
    <h1>Chi tiết phim: {{ $movie->title }}</h1>

    <p><strong>Tiêu đề:</strong> {{ $movie->title }}</p>
    <p><strong>Mô tả:</strong> {{ $movie->description ?? 'Chưa có mô tả' }}</p>
    <p><strong>Thể loại:</strong> {{ $movie->genre ?? 'Không rõ' }}</p>
    <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
    <p><strong>Ngày khởi chiếu:</strong> 
        {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') : 'Chưa xác định' }}
    </p>

    <p><strong>Poster:</strong></p>
    @if($movie->poster)
        <img src="{{ asset('storage/'.$movie->poster) }}" alt="Poster" width="200">
    @else
        <p>Chưa có poster</p>
    @endif

    <br><br>
    <a href="{{ route('admin.movies.edit', $movie->id) }}">✏️ Sửa</a> |
    <a href="{{ route('admin.movies.index') }}">⬅️ Quay lại danh sách</a>
@endsection
