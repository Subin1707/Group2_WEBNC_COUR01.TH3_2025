@extends('layouts.auth')

@section('title', 'Đăng ký')

@section('content')
    <h2>Đăng ký</h2>

    @include('partials.errors')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Họ và tên</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Mật khẩu</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Xác nhận mật khẩu</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Đăng ký</button>

        <div class="extra-links">
            <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
        </div>
    </form>
@endsection
