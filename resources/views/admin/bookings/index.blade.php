@extends('layouts.app')

@section('title', 'Quản lý Booking')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🎫 Quản lý Booking</h1>

    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-3">+ Thêm Booking</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Khách hàng</th>
                    <th>Phim</th>
                    <th>Rạp</th>
                    <th>Phòng</th>
                    <th>Ghế</th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->customer->name ?? 'Khách ẩn' }}</td>
                        <td>{{ $booking->showtime->movie->title }}</td>
                        <td>{{ $booking->showtime->room->theater->name ?? 'Chưa xác định' }}</td>
                        <td>{{ $booking->showtime->room->name }}</td>
                        <td>
                            @if(is_array($booking->seat_number))
                                {{ implode(', ', $booking->seat_number) }}
                            @else
                                {{ $booking->seat_number }}
                            @endif
                        </td>
                        <td>{{ $booking->showtime->start_time }}</td>
                        <td>
                            @if($booking->status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($booking->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @else
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info btn-sm mb-1">Xem</a>
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm mb-1">Sửa</a>
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Xóa booking này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">← Quay lại Dashboard</a>
</div>
@endsection
