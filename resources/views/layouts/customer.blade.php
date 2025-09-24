<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <nav class="bg-green-600 p-4 text-white">
        <h1 class="text-lg font-bold">Customer Panel</h1>
        <a href="{{ route('customer.dashboard') }}" class="mr-4">Trang chủ</a>
        <a href="{{ route('customer.booking.index') }}" class="mr-4">Đặt vé</a>
        <a href="{{ route('customer.history') }}" class="mr-4">Lịch sử</a>
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
