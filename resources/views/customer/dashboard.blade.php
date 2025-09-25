<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🎟️ Customer Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">🎟️ Customer Dashboard</h1>

    <p class="mb-4">
        Xin chào, <strong>{{ Auth::guard('customer')->user()->name }}</strong>
    </p>

    <!-- Navigation -->
    <nav class="space-x-4 mb-8">
        <a href="{{ route('customer.booking.create', 1) }}" class="text-blue-600">🎞️ Đặt vé</a>
        <a href="{{ route('customer.history') }}" class="text-blue-600">📜 Lịch sử đặt vé</a>
        <a href="{{ route('customer.movies.index') }}" class="text-blue-600">🎬 Danh sách phim</a>
    </nav>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🎫 Tổng số booking</h2>
            <p class="text-3xl font-bold">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🎞️ Tổng số phim</h2>
            <p class="text-3xl font-bold">{{ $totalMovies }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🕒 Booking gần đây</h2>
            <ul class="text-left">
                @forelse($recentBookings as $booking)
                    <li>
                        {{ $booking->showtime->movie->title }} - {{ $booking->seat_number }} ({{ $booking->showtime->start_time }})
                    </li>
                @empty
                    <li>Chưa có booking nào</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            🚪 Logout
        </button>
    </form>

</div>
</body>
</html>
