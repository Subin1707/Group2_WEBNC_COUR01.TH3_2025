@extends('layouts.admin')

@section('title', 'Edit Movie')

@section('content')
<h1>✏️ Edit Movie</h1>
<form method="POST" action="{{ route('admin.movies.update', $movie->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
    </div>
    <div class="mb-3">
        <label>Genre</label>
        <input type="text" name="genre" class="form-control" value="{{ $movie->genre }}">
    </div>
    <div class="mb-3">
        <label>Duration (minutes)</label>
        <input type="number" name="duration" class="form-control" value="{{ $movie->duration }}">
    </div>
    <div class="mb-3">
        <label>Release Date</label>
        <input type="date" name="release_date" class="form-control" value="{{ $movie->release_date }}">
    </div>
    <div class="mb-3">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control">
        @if($movie->poster)
            <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" width="100" class="mt-2">
        @endif
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
