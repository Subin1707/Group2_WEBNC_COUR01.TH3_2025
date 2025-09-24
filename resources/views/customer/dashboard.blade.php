<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6">Customer Dashboard</h1>

        <p class="mb-4">Xin chào, {{ Auth::guard('customer')->user()->name }}</p>

        <nav class="space-x-4">
            <a href="{{ route('customer.booking.index') }}" class="text-blue-600">Đặt vé</a>
            <a href="{{ route('customer.history') }}" class="text-blue-600">Lịch sử đặt vé</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
        </form>
    </div>
</body>
</html>
