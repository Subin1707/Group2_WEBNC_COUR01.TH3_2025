@extends('layouts.app')

@section('content')
<div class="card">
    <h3>Thêm khách hàng mới</h3>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label>Tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>SĐT:</label><br>
        <input type="text" name="phone"><br><br>

        <label>Địa chỉ:</label><br>
        <input type="text" name="address"><br><br>

        <button type="submit">Lưu</button>
    </form>
</div>
@endsection
