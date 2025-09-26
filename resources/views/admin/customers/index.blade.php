@extends('layouts.admin')

@section('title', 'Quản lý khách hàng')

@section('content')
<div class="container py-4">
    <h1>👥 Quản lý khách hàng</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary mb-3">+ Thêm khách hàng</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.customers.show', $customer) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Chưa có khách hàng nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
