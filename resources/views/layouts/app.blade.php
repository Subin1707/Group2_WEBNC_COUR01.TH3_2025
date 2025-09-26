<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #f8f9fa; padding: 20px; }
        .sidebar a { display: block; margin-bottom: 10px; text-decoration: none; color: #333; }
        .sidebar a:hover { text-decoration: underline; }
        .main { flex: 1; padding: 20px; }
        .logout button { width: 100%; }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>🎬 Cinema</h2>

        @guest
            <a href="{{ route('login.form') }}">🔑 Đăng nhập</a>
            <a href="{{ route('register') }}">📝 Đăng ký</a>
        @endguest

        @auth
            <div class="p-3 text-center border-bottom mb-3">
                👋 Xin chào, <strong>{{ Auth::guard('customer')->user()->name ?? Auth::user()->name }}</strong>
            </div>

            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">🏠 Admin Dashboard</a>
                <a href="{{ route('admin.movies.index') }}">🎞️ Quản lý phim</a>
                <a href="{{ route('admin.theaters.index') }}">🏢 Quản lý rạp</a>
                <a href="{{ route('admin.rooms.index') }}">📺 Quản lý phòng</a>
                <a href="{{ route('admin.showtimes.index') }}">🕒 Quản lý suất chiếu</a>
                <a href="{{ route('admin.tickets.index') }}">🎫 Quản lý vé</a>
                <a href="{{ route('admin.customers.index') }}">👥 Quản lý khách hàng</a>
            @elseif(Auth::guard('customer')->check())
                <a href="{{ route('customer.dashboard') }}">🏠 Trang khách hàng</a>
                <a href="{{ route('customer.movies.index') }}">🎞️ Chọn phim & Đặt vé</a>
                <a href="{{ route('customer.history') }}">📜 Lịch sử</a>
            @endif

            <!-- Logout -->
            <div class="logout mt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">🚪 Đăng xuất</button>
                </form>
            </div>
        @endauth
    </div>

    <!-- Main content -->
    <div class="main">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
