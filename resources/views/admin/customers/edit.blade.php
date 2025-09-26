@extends('layouts.admin')

@section('title', 'Sửa khách hàng')

@section('content')
<div class="container py-4">
    <h1>✏️ Sửa khách hàng #{{ $customer->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.customers.update', $customer) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu (để trống nếu không muốn thay đổi)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
