@extends('layouts.app')

@section('title', 'Danh sách phim')

@section('content')
<div class="container mt-4">
    <h1>🎬 Danh sách phim</h1>

    @if($movies->count())
        <div class="list-group">
            @foreach($movies as $movie)
                <a href="{{ route('customer.movies.show', $movie->id) }}" class="list-group-item list-group-item-action">
                    {{ $movie->title }}
                </a>
            @endforeach
        </div>
    @else
        <p>Chưa có phim nào.</p>
    @endif

    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary mt-3">⬅️ Quay lại Dashboard</a>
</div>
@endsection
