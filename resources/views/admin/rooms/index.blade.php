@extends('layouts.admin')

@section('title', 'Danh sách Phòng')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">📺 Danh sách Phòng</h1>

    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">➕ Thêm phòng mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Tên phòng</th>
                <th>Rạp</th>
                <th>Số ghế</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->theater->name ?? 'Chưa xác định' }}</td>
                    <td>{{ $room->total_seats }}</td>
                    <td>
                        <a href="{{ route('admin.rooms.show', $room) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Xóa phòng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
