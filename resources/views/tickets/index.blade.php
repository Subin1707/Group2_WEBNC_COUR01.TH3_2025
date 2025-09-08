@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Vé</h1>

    {{-- Form tìm kiếm --}}
    <form method="GET" action="{{ route('tickets.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo số ghế..."
               class="form-control w-25 d-inline">
        <button type="submit" class="btn btn-secondary">🔍 Tìm</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-light">❌ Reset</a>
    </form>

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">➕ Thêm vé</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Số ghế</th>
                <th>Giá vé</th>
                <th>Trạng thái</th>
                <th>Suất chiếu</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->seat_number }}</td>
                <td>{{ number_format($ticket->price) }} VNĐ</td>
                <td>{{ $ticket->status ? 'Đã bán' : 'Chưa bán' }}</td>
                <td>{{ $ticket->showtime->id ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-info btn-sm">👁 Xem</a>
                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">✏ Sửa</a>
                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa vé này?')">🗑 Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Chưa có vé nào</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $tickets->links() }}
</div>
@endsection
