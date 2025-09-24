@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="card">
    <h3>👨‍💼 Admin Dashboard</h3>
    <p>Xin chào <strong>{{ Auth::user()->name }}</strong>, bạn đang ở giao diện quản trị.</p>
</div>

<div class="card">
    <h4>Chức năng nhanh</h4>
    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('admin.movies.index') }}" class="btn btn-primary">🎞️ Quản lý phim</a>
        <a href="{{ route('admin.theaters.index') }}" class="btn btn-info">🏢 Quản lý rạp</a>
        <a href="{{ route('admin.showtimes.index') }}" class="btn btn-success">🕒 Quản lý suất chiếu</a>
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-warning">🎫 Quản lý vé</a>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-danger">👥 Quản lý khách hàng</a>
    </div>
</div>
@endsection
