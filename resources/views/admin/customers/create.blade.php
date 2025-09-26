@extends('layouts.admin')

@section('title', 'Thêm khách hàng mới')

@section('content')
<div class="container py-4">
    <h1>+ Thêm khách hàng mới</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.customers.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Tạo khách hàng</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
