@extends('layouts.app')

@section('content')
<div class="card">
    <h3>Danh sách khách hàng</h3>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">+ Thêm khách hàng</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px;">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Hành động</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->address }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer) }}">✏️ Sửa</a>
                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Xóa khách hàng này?')">🗑️ Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
