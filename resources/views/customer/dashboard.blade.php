<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🎟️ Customer Dashboard</title>
    <style>
        /* Reset cơ bản */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 15px;
        }

        /* Navigation */
        nav {
            margin-bottom: 25px;
        }

        nav a {
            display: inline-block;
            margin-right: 20px;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.2s;
        }

        nav a:hover {
            background-color: #0056b3;
        }

        /* Cards */
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            flex: 1 1 calc(33.333% - 13.33px);
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 12px;
            color: #333;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .card ul {
            list-style: none;
            padding-left: 0;
            text-align: left;
            max-height: 150px;
            overflow-y: auto;
        }

        .card ul li {
            padding: 4px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #555;
        }

        /* Logout button */
        .logout-btn {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cards {
                flex-direction: column;
            }
            .card {
                flex: 1 1 100%;
            }
            nav a {
                margin-bottom: 10px;
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Tên khách hàng -->
    <h1>🎟️ Customer Dashboard</h1>
    <p>Xin chào, <strong>{{ Auth::guard('customer')->user()->name }}</strong></p>

    <!-- Navigation -->
    <nav>
        <a href="{{ route('customer.booking.create', 1) }}">🎞️ Đặt vé</a>
        <a href="{{ route('customer.history') }}">📜 Lịch sử đặt vé</a>
        <a href="{{ route('customer.movies.index') }}">🎬 Danh sách phim</a>
    </nav>

    <!-- Cards -->
    <div class="cards">
        <!-- Tổng số booking -->
        <div class="card">
            <h2>🎫 Tổng số booking</h2>
            <p>{{ $totalBookings }}</p>
        </div>

        <!-- Tổng số phim -->
        <div class="card">
            <h2>🎞️ Tổng số phim</h2>
            <p>{{ $totalMovies }}</p>
        </div>

        <!-- Booking gần đây -->
        <div class="card">
            <h2>🕒 Booking gần đây</h2>
            <ul>
                @forelse($recentBookings as $booking)
                    <li>{{ $booking->showtime->movie->title }} - Ghế {{ $booking->seat_number }} ({{ $booking->showtime->start_time }})</li>
                @empty
                    <li>Chưa có booking nào</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">🚪 Logout</button>
    </form>
</div>

</body>
</html>
