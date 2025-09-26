@extends('layouts.admin')

@section('title', 'Add Movie')

@section('content')
<h1>➕ Add Movie</h1>
<form method="POST" action="{{ route('admin.movies.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Genre</label>
        <input type="text" name="genre" class="form-control">
    </div>
    <div class="mb-3">
        <label>Duration (minutes)</label>
        <input type="number" name="duration" class="form-control">
    </div>
    <div class="mb-3">
        <label>Release Date</label>
        <input type="date" name="release_date" class="form-control">
    </div>
    <div class="mb-3">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control">
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
