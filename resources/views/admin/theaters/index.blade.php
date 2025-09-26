@extends('layouts.admin')

@section('title', 'Theaters')

@section('content')
<h1>🏢 Theaters</h1>
<a href="{{ route('admin.theaters.create') }}" class="btn btn-success mb-2">➕ Add Theater</a>

@if($theaters->count())
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($theaters as $theater)
        <tr>
            <td>{{ $theater->id }}</td>
            <td>{{ $theater->name }}</td>
            <td>{{ $theater->location }}</td>
            <td>
                <a href="{{ route('admin.theaters.edit', $theater->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('admin.theaters.destroy', $theater->id) }}" method="POST" class="d-inline">
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
<p>Chưa có theater nào.</p>
@endif
@endsection
