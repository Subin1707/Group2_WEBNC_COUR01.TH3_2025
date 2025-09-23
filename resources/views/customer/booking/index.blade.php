@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🎬 Phim đang chiếu</h2>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                        <a href="{{ route('booking.theater', $movie->id) }}" class="btn btn-primary">Xem suất chiếu</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
