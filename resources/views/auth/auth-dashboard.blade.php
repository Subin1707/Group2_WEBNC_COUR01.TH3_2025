@extends('layouts.app')

@if (session('success'))
    <div id="success-message"
         style="background: #d4edda; color:#155724; padding:12px; border-radius:6px; margin-bottom:15px; text-align:center;">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            let msg = document.getElementById('success-message');
            if (msg) {
                msg.style.transition = "opacity 0.5s ease";
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 500);
            }
        }, 5000);
    </script>
@endif


@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <h3>
            Xin chào, {{ Auth::check() ? Auth::user()->name : 'Khách' }} 👋
        </h3>
        <p>Chào mừng bạn đến với hệ thống quản lý rạp phim.</p>
    </div>

    <div class="admin-section">
        <h3>Khu vực dành cho Admin</h3>
        <div class="admin-links">
            <a href="{{ route('movies.index') }}">🎥 Quản lý phim</a>
            <a href="{{ route('theaters.index') }}">🏢 Quản lý rạp</a>
            <a href="{{ route('rooms.index') }}">🎦 Quản lý phòng chiếu</a>
            <a href="{{ route('showtimes.index') }}">🕒 Quản lý suất chiếu</a>
            <a href="{{ route('tickets.index') }}">🎫 Quản lý vé</a>
            <a href="{{ route('customers.index') }}">👥 Quản lý khách hàng</a>
        </div>
    </div>
@endsection
