<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-lg mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Profile</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="mt-1 block w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">New Password</label>
                <input type="password" name="password" class="mt-1 block w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" class="mt-1 block w-full border rounded p-2">
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Cập nhật</button>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white px-4 py-2 rounded">Xóa tài khoản</button>
        </form>
    </div>
</body>
</html>
