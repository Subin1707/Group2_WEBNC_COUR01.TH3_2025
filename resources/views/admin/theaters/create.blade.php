@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm rạp mới</h1>
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
            <input type="text" name="region" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
