@extends('layouts.admin')

@section('title', 'Chi tiết khách hàng')

@section('content')
<div class="container py-4">
    <h1>👤 Chi tiết khách hàng #{{ $customer->id }}</h1>

    <p><strong>Tên:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Ngày tạo:</strong> {{ $customer->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary mt-3">← Quay lại danh sách</a>
</div>
@endsection
