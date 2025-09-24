@extends('layouts.auth')

@section('title', 'Quên mật khẩu')

@section('content')
    <h2>Quên mật khẩu</h2>
    <p class="text-sm text-gray-600">
        Nhập email để nhận liên kết đặt lại mật khẩu.
    </p>

    @include('partials.errors')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        <button type="submit">Gửi liên kết đặt lại</button>

        <div class="extra-links">
            <p><a href="{{ route('login') }}">← Quay lại đăng nhập</a></p>
        </div>
    </form>
@endsection
