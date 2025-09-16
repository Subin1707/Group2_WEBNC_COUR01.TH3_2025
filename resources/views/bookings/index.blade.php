@extends('layouts.app')

@section('content')
<div class="card">
    <h3>Danh sách đặt vé 🎫</h3>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary">+ Đặt vé mới</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px;">
        <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Suất chiếu</th>
            <th>Ghế</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->customer->name }}</td>
            <td>{{ $booking->showtime->id }}</td>
            <td>{{ $booking->seat->id }}</td>
            <td>{{ $booking->status }}</td>
            <td>
                <a href="{{ route('bookings.edit', $booking) }}">✏️ Sửa</a>
                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">🗑️ Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
