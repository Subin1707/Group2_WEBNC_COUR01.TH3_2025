@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm rạp mới</h1>

    <form action="{{ route('theaters.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tên rạp</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Địa chỉ</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Khu vực</label>
            <input type="text" name="region" class="form-control">
        </div>
        <div class="mb-3">
            <label>Điện thoại</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('theaters.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
