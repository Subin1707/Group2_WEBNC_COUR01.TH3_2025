@extends('layouts.app')

@section('content')
<h1>Chi tiết phim</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>Tiêu đề:</strong> {{ $movie->title }}</li>
    <li class="list-group-item"><strong>Thể loại:</strong> {{ $movie->genre }}</li>
    <li class="list-group-item"><strong>Thời lượng:</strong> {{ $movie->duration }} phút</li>
    <li class="list-group-item"><strong>Ngày phát hành:</strong> {{ $movie->release_date }}</li>
    <li class="list-group-item"><strong>Mô tả:</strong> {{ $movie->description }}</li>
</ul>

<a href="{{ route('movies.index') }}" class="btn btn-primary mt-3">Quay lại</a>
@endsection
