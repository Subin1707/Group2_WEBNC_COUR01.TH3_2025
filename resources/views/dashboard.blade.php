<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        .admin-section {
            margin-top: 30px;
        }

        .admin-section h3 {
            margin-bottom: 10px;
        }

        .admin-links a {
            display: inline-block;
            margin: 5px 10px 5px 0;
            padding: 10px 15px;
            background: #3498db;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .admin-links a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>🎬 Cinema</h2>
        <a href="{{ url('/dashboard') }}">🏠 Trang chủ</a>
        <a href="#">⚙️ Quản lý</a>

    @guest
        <!-- Nếu chưa đăng nhập -->
        <div class="logout">
            <a href="{{ route('login') }}">🔑 Đăng nhập</a>
            <a href="{{ route('register') }}">📝 Đăng ký</a>
        </div>
    @endguest

    @auth
        <!-- Nếu đã đăng nhập -->
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
            </div>
        </div>
    </div>
</div>
</body>
</html>
