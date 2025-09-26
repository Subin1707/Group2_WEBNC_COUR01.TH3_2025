@extends('layouts.admin')

@section('title', 'Sửa rạp - ' . $theater->name)

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🏢 Sửa rạp: {{ $theater->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.theaters.update', $theater->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên rạp</label>
            <input type="text" name="name" value="{{ old('name', $theater->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="address" value="{{ old('address', $theater->address) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Khu vực</label>
            <input type="text" name="region" value="{{ old('region', $theater->region) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone', $theater->phone) }}" class="form-control">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">💾 Cập nhật</button>
            <a href="{{ route('admin.theaters.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
        </div>
    </form>
</div>
@endsection
