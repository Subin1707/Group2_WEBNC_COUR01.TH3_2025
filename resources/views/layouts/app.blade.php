<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
          rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #ecf0f1;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
            margin: 0;
            background: #1a252f;
        }

        .sidebar a {
            padding: 15px 20px;
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        .sidebar .logout {
            margin-top: auto;
            padding: 15px 20px;
            background: #c0392b;
            text-align: center;
        }

        .sidebar .logout button {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>🎬 Cinema</h2>

        @guest
            <!-- Nếu chưa đăng nhập -->
            <a href="{{ route('login') }}">🔑 Đăng nhập</a>
            <a href="{{ route('register') }}">📝 Đăng ký</a>
        @endguest

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">🏠 Admin Dashboard</a>
                <a href="{{ route('admin.movies.index') }}">🎞️ Quản lý phim</a>
                <a href="{{ route('admin.theaters.index') }}">🏢 Quản lý rạp</a>
                <a href="{{ route('admin.rooms.index') }}">📺 Quản lý phòng</a>
                <a href="{{ route('admin.showtimes.index') }}">🕒 Quản lý suất chiếu</a>
                <a href="{{ route('admin.tickets.index') }}">🎫 Quản lý vé</a>
                <a href="{{ route('admin.customers.index') }}">👥 Quản lý khách hàng</a>
            @elseif(Auth::user()->role === 'customer')
                <a href="{{ route('customer.dashboard') }}">🏠 Trang khách hàng</a>
                <a href="{{ route('customer.booking.index') }}">🎞️ Đặt vé</a>
                <a href="{{ route('customer.history') }}">📜 Lịch sử</a>
            @endif

            <!-- Logout -->
            <div class="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">🚪 Đăng xuất</button>
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
