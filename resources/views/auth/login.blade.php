<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">Đăng nhập</h1>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Vai trò</label>
            <select name="role" required class="w-full border px-3 py-2 rounded">
                <option value="web">Quản lý / Admin</option>
                <option value="customer">Khách hàng</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email / Username</label>
            <input type="text" name="email" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Mật khẩu</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Đăng nhập
        </button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">
            Chưa có tài khoản? 
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Đăng ký ngay</a>
        </p>
    </div>
</div>
</body>
</html>
