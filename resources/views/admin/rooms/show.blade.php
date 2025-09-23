@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết phòng chiếu</h1>

    {{-- Thông báo thành công (nếu có) --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">{{ $room->name }}</h3>
            <p><strong>Loại phòng:</strong> {{ $room->type }}</p>
            <p><strong>Số ghế:</strong> {{ $room->total_seats }}</p>
            <p><strong>Thuộc rạp:</strong> {{ $room->theater->name ?? 'N/A' }}</p>
            <p><strong>Địa chỉ rạp:</strong> {{ $room->theater->address ?? 'N/A' }}</p>
            <p><strong>Ngày tạo:</strong> {{ $room->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Cập nhật lần cuối:</strong> {{ $room->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    {{-- Nút hành động --}}
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">⬅ Quay lại danh sách</a>
    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">✏ Sửa</a>
    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('Bạn có chắc muốn xóa phòng này?')">🗑 Xóa</button>
    </form>
</div>
@endsection
