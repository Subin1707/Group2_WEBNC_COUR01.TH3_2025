@extends('layouts.auth')

@section('title', 'Đặt lại mật khẩu')

@section('content')
    <h2>Đặt lại mật khẩu</h2>

    @include('partials.errors')

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>

        <label for="password">Mật khẩu mới</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Xác nhận mật khẩu</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Cập nhật mật khẩu</button>

        <div class="extra-links">
            <p><a href="{{ route('login') }}">← Quay lại đăng nhập</a></p>
        </div>
    </form>
@endsection
