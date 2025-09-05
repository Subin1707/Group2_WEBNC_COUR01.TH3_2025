@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách phòng chiếu</h1>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Nút thêm phòng chiếu --}}
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">+ Thêm phòng chiếu</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên phòng</th>
                <th>Loại</th>
                <th>Số ghế</th>
                <th>Rạp</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->type }}</td>
                    <td>{{ $room->total_seats }}</td>
                    <td>{{ $room->theater->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa phòng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Chưa có phòng chiếu nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
