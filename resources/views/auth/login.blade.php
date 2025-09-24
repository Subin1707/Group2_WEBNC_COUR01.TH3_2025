@extends('layouts.auth')

@section('title', 'Đăng nhập')

@section('content')
    <h2>Đăng nhập</h2>

    @include('partials.errors')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        <label for="password">Mật khẩu</label>
        <input id="password" type="password" name="password" required>

        <button type="submit">Đăng nhập</button>

        <div class="extra-links">
            <p><a href="{{ route('password.request') }}">Quên mật khẩu?</a></p>
            <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></p>
        </div>
    </form>
@endsection
