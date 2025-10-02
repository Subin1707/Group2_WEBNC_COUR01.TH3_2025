@extends('layouts.app')

@section('title', 'Chi tiết rạp - ' . $theater->name)

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🏢 Chi tiết rạp: {{ $theater->name }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Tên rạp:</strong> {{ $theater->name }}</p>
            <p><strong>Địa chỉ:</strong> {{ $theater->address }}</p>
            <p><strong>Khu vực:</strong> {{ $theater->region }}</p>
            <p><strong>Số điện thoại:</strong> {{ $theater->phone }}</p>
        </div>
    </div>

    <a href="{{ route('admin.theaters.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
</div>
@endsection
