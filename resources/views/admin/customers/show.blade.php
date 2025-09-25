@extends('layouts.app')

@section('title', 'Chi tiết khách hàng')

@section('content')
<div class="container py-4">
    <h1>Chi tiết khách hàng</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $customer->id }}</p>
            <p><strong>Tên:</strong> {{ $customer->name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Ngày tạo:</strong> {{ $customer->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Cập nhật lần cuối:</strong> {{ $customer->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
