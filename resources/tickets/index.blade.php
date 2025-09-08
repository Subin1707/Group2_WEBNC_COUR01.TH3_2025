@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách vé</h2>

    {{-- Form tìm kiếm --}}
    <form method="GET" action="{{ route('tickets.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Tìm theo số ghế hoặc trạng thái">
        <button type="submit">Tìm kiếm</button>
        <a href="{{ route('tickets.index') }}">Reset</a>
    </form>

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">➕ Thêm vé</a>

    {{-- Thông báo thành công --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table border="1" width="100%" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Suất chiếu</th>
                <th>Số ghế</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->showtime->id }}</td>
                <td>{{ $ticket->seat_number }}</td>
                <td>{{ number_format($ticket->price, 0, ',', '.') }} đ</td>
                <td>
                    @if($ticket->status == 'booked')
                        <span style="color: red; font-weight: bold;">Đã đặt</span>
                    @else
                        <span style="color: green; font-weight: bold;">Còn trống</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">✏ Sửa</a>
                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa vé này?')">🗑 Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Không có vé nào</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
