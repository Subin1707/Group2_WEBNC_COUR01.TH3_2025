@extends('layouts.app')

@section('title', 'Chọn Phim')

@section('content')
<h1 class="mb-4">Chọn Phim</h1>
<div class="row">
    @foreach($movies as $movie)
        <div class="col-md-3 mb-3">
            <a href="{{ route('booking.selectShowtime', $movie->id) }}" class="card h-100 text-decoration-none text-dark">
                <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ $movie->genre }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection
