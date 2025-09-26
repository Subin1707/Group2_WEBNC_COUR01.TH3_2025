<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .sidebar { width: 250px; min-height: 100vh; background: #f8f9fa; padding: 20px; }
        .sidebar a { display: block; margin-bottom: 10px; text-decoration: none; color: #333; }
        .sidebar a:hover { text-decoration: underline; }
        .main { flex: 1; padding: 20px; }
        .wrapper { display: flex; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h3>🎬 Admin Panel</h3>
        <p class="border-bottom mb-2 p-2 text-center">👋 {{ Auth::user()->name }}</p>

        <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('admin.movies.index') }}">🎞️ Movies</a>
        <a href="{{ route('admin.theaters.index') }}">🏢 Theaters</a>
        <a href="{{ route('admin.rooms.index') }}">📺 Rooms</a>
        <a href="{{ route('admin.showtimes.index') }}">🕒 Showtimes</a>
        <a href="{{ route('admin.bookings.index') }}">🎫 Bookings</a>
        {{-- <a href="{{ route('admin.customers.index') }}">👥 Customers</a> --}}

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger w-100 mt-3">🚪 Logout</button>
        </form>
    </div>

    <div class="main">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
