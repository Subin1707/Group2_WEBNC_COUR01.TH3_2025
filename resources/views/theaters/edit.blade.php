@extends('layouts.app')

@section('title', 'Sửa Rạp')

@section('content')
<h2>Sửa Rạp</h2>
<form method="POST" action="{{ route('theaters.update', $theater->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Tên rạp</label>
        <input type="text" name="name" class="form-control" value="{{ $theater->name }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Địa chỉ</label>
        <input type="text" name="address" class="form-control" value="{{ $theater->address }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Khu vực</label>
        <input type="text" name="region" class="form-control" value="{{ $theater->region }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" name="phone" class="form-control" value="{{ $theater->phone }}">
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('theaters.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
