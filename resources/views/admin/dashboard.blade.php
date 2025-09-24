<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

        <p class="mb-4">Xin chào, {{ Auth::user()->name }}</p>

        <nav class="space-x-4">
            <a href="{{ route('movies.index') }}" class="text-blue-600">Quản lý Phim</a>
            <a href="{{ route('theaters.index') }}" class="text-blue-600">Quản lý Rạp</a>
            <a href="{{ route('rooms.index') }}" class="text-blue-600">Quản lý Phòng</a>
            <a href="{{ route('showtimes.index') }}" class="text-blue-600">Lịch chiếu</a>
            <a href="{{ route('tickets.index') }}" class="text-blue-600">Vé</a>
            <a href="{{ route('customers.index') }}" class="text-blue-600">Khách hàng</a>
            <a href="{{ route('profile.edit') }}" class="text-blue-600">Profile</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
        </form>
    </div>
</body>
</html>
