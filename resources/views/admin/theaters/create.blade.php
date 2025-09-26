@extends('layouts.admin')

@section('title', 'Add Theater')

@section('content')
<h1>➕ Add Theater</h1>
<form method="POST" action="{{ route('admin.theaters.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control">
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.theaters.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
