@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa thông tin rạp</h1>

    <form action="{{ route('theaters.update', $theater) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Tên rạp</label>
            <input type="text" name="name" class="form-control" value="{{ $theater->name }}" required>
        </div>
        <div class="mb-3">
            <label>Địa chỉ</label>
            <input type="text" name="address" class="form-control" value="{{ $theater->address }}" required>
        </div>
        <div class="mb-3">
            <label>Khu vực</label>
            <input type="text" name="region" class="form-control" value="{{ $theater->region }}">
        </div>
        <div class="mb-3">
            <label>Điện thoại</label>
            <input type="text" name="phone" class="form-control" value="{{ $theater->phone }}">
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('theaters.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
