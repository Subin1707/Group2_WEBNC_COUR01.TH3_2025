@extends('layouts.app')

@section('content')
    <h1>Danh sách phim</h1>

    @if($movies->count())
        <ul>
            @foreach($movies as $movie)
                <li>
                    <a href="{{ route('customer.movies.show', $movie->id) }}">
                        {{ $movie->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Chưa có phim nào.</p>
    @endif

    <a href="{{ route('customer.dashboard') }}">⬅️ Quay lại Dashboard</a>
@endsection
