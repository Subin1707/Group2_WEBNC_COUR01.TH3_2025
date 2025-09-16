@extends('layouts.app')

@section('content')
<div class="card">
    <h3>Sửa thông tin khách hàng</h3>
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf @method('PUT')
        <label>Tên:</label><br>
        <input type="text" name="name" value="{{ $customer->name }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $customer->email }}" required><br><br>

        <label>SĐT:</label><br>
        <input type="text" name="phone" value="{{ $customer->phone }}"><br><br>

        <label>Địa chỉ:</label><br>
        <input type="text" name="address" value="{{ $customer->address }}"><br><br>

        <button type="submit">Cập nhật</button>
    </form>
</div>
@endsection
