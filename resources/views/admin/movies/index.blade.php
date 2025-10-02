@extends('layouts.app')

@section('title', 'Movies')

@section('content')
<h1>🎞️ Movies</h1>
<a href="{{ route('admin.movies.create') }}" class="btn btn-success mb-2">➕ Add Movie</a>

@if($movies->count())
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>Release Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->genre }}</td>
            <td>{{ $movie->duration }}</td>
            <td>{{ $movie->release_date }}</td>
            <td>
                <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Chưa có phim nào.</p>
@endif
@endsection
