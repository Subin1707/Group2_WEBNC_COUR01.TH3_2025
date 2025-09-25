<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>📊 Admin Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">📊 Admin Dashboard</h1>

    <p class="mb-4">Xin chào, <strong>{{ Auth::user()->name }}</strong></p>

    <!-- Navigation -->
    <nav class="space-x-4 mb-8">
        <a href="{{ route('admin.movies.index') }}" class="text-blue-600">🎞️ Quản lý Phim</a>
        <a href="{{ route('admin.theaters.index') }}" class="text-blue-600">🏢 Quản lý Rạp</a>
        <a href="{{ route('admin.rooms.index') }}" class="text-blue-600">📺 Quản lý Phòng</a>
        <a href="{{ route('admin.showtimes.index') }}" class="text-blue-600">🕒 Lịch chiếu</a>
        <a href="{{ route('admin.bookings.index') }}" class="text-blue-600">🎫 Booking</a>
    </nav>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🎞️ Movies</h2>
            <p class="text-3xl font-bold">{{ $moviesCount }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🏢 Theaters</h2>
            <p class="text-3xl font-bold">{{ $theatersCount }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">📺 Rooms</h2>
            <p class="text-3xl font-bold">{{ $roomsCount }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🕒 Showtimes</h2>
            <p class="text-3xl font-bold">{{ $showtimesCount }}</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-2">🎫 Bookings</h2>
            <p class="text-3xl font-bold">{{ $bookingsCount }}</p>
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
