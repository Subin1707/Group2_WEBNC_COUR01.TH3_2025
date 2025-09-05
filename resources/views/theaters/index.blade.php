@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Rạp</h1>
    <a href="{{ route('theaters.create') }}" class="btn btn-primary">➕ Thêm rạp</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên rạp</th>
                <th>Địa chỉ</th>
                <th>Khu vực</th>
                <th>Điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($theaters as $theater)
            <tr>
                <td>{{ $theater->id }}</td>
                <td>{{ $theater->name }}</td>
                <td>{{ $theater->address }}</td>
                <td>{{ $theater->region }}</td>
                <td>{{ $theater->phone }}</td>
                <td>
                    <a href="{{ route('theaters.show', $theater) }}" class="btn btn-info btn-sm">👁 Xem</a>
                    <a href="{{ route('theaters.edit', $theater) }}" class="btn btn-warning btn-sm">✏ Sửa</a>
                    <form action="{{ route('theaters.destroy', $theater) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xóa rạp này?')">🗑 Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
