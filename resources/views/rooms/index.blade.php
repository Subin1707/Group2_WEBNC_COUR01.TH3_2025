@extends('layouts.app')

@section('title', 'Quản lý phòng chiếu')

@section('content')
<div class="container">

    {{-- Header + nút thêm --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Danh sách phòng chiếu</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-success">
            + Thêm phòng chiếu
        </a>
    </div>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form tìm kiếm --}}
    <form action="{{ route('rooms.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}"
                   class="form-control" placeholder="Tìm phòng hoặc rạp...">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
        </div>
    </form>

    {{-- Bảng danh sách --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" style="width: 60px;">ID</th>
                        <th>Tên phòng</th>
                        <th>Loại</th>
                        <th class="text-center">Số ghế</th>
                        <th>Rạp</th>
                        <th class="text-center" style="width: 160px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                        <tr>
                            <td class="text-center">{{ $room->id }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->type }}</td>
                            <td class="text-center">{{ $room->total_seats }}</td>
                            <td>{{ $room->theater->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('rooms.edit', $room->id) }}"
                                   class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}"
                                      method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc muốn xóa phòng này?')">
                                        Xóa
                                    </button>
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
    </div>

    {{-- Phân trang Bootstrap 5 --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $rooms->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
