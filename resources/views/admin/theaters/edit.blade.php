@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa rạp</h1>
    <form method="POST" action="{{ route('theaters.update', $theater) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên rạp</label>
            <input type="text" name="name" value="{{ $theater->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="address" value="{{ $theater->address }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Khu vực</label>
            <input type="text" name="region" value="{{ $theater->region }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone" value="{{ $theater->phone }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
