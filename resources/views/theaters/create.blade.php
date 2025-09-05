@extends('layouts.app')

@section('title', 'Thêm Rạp')

@section('content')
<h2>Thêm Rạp</h2>
<form method="POST" action="{{ route('theaters.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên rạp</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Khu vực</label>
        <input type="text" name="region" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('theaters.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
