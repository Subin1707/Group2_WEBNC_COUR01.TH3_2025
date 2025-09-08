@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chi tiết vé #{{ $ticket->id }}</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $ticket->id }}</td>
        </tr>
        <tr>
            <th>Suất chiếu</th>
            <td>{{ $ticket->showtime->id }}</td>
        </tr>
        <tr>
            <th>Số ghế</th>
            <td>{{ $ticket->seat_number }}</td>
        </tr>
        <tr>
            <th>Giá vé</th>
            <td>{{ number_format($ticket->price, 0, ',', '.') }} đ</td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>
                @if($ticket->status == 'booked')
                    <span style="color: red; font-weight: bold;">Đã đặt</span>
                @else
                    <span style="color: green; font-weight: bold;">Còn trống</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <th>Cập nhật lần cuối</th>
            <td>{{ $ticket->updated_at->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning">✏ Sửa</a>
    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa vé này?')">🗑 Xóa</button>
    </form>
</div>
@endsection
