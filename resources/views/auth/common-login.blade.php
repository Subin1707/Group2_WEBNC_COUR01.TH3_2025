@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h2 class="text-center">Đăng nhập hệ thống</h2>

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form login --}}
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group form-check" style="margin-bottom: 15px;">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>
</div>
@endsection
