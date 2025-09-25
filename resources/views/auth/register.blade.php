@extends('layouts.auth')

@section('title', 'Đăng ký')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Đăng ký</h2>

@if ($errors->any())
    <div class="mb-4 text-red-700">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="mb-4 text-green-700">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('register.submit') }}">
    @csrf

    <input type="hidden" name="role" value="customer">

    <div class="mb-4">
        <label for="name" class="block mb-1">Họ và tên</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-4">
        <label for="email" class="block mb-1">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-4">
        <label for="password" class="block mb-1">Mật khẩu</label>
        <input id="password" type="password" name="password" required
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block mb-1">Xác nhận mật khẩu</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
               class="w-full border px-3 py-2 rounded">
    </div>

    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
        Đăng ký
    </button>

    <p class="mt-4 text-center text-sm text-gray-600">
        Đã có tài khoản? 
        <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Đăng nhập</a>
    </p>
</form>
@endsection
