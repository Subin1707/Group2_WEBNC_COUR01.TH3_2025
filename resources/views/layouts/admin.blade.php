<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <h1 class="text-lg font-bold">Admin Panel</h1>
        <a href="{{ route('admin.dashboard') }}" class="mr-4">Dashboard</a>
        <a href="{{ route('admin.movies.index') }}" class="mr-4">Quản lý Phim</a>
        <a href="{{ route('admin.customers.index') }}" class="mr-4">Khách hàng</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit">Đăng xuất</button>
        </form>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
