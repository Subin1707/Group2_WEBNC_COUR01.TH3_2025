@extends('layouts.admin')

@section('title', 'Chi tiết Booking #' . $booking->id)

@section('content')
<div class="container mt-4">
    <h1>Chi tiết Booking #{{ $booking->id }}</h1>

    <p><strong>Khách hàng:</strong> {{ $booking->customer->name ?? 'Khách ẩn' }}</p>
    <p><strong>Phim:</strong> {{ $booking->showtime->movie->title }}</p>
    <p><strong>Rạp:</strong> {{ $booking->showtime->room->theater->name ?? 'Chưa xác định' }}</p>
    <p><strong>Phòng:</strong> {{ $booking->showtime->room->name }}</p>
    <p><strong>Ghế:</strong> 
        @if(is_array($booking->seat_number))
            {{ implode(', ', $booking->seat_number) }}
        @else
            {{ $booking->seat_number }}
        @endif
    </p>
    <p><strong>Thời gian:</strong> {{ $booking->showtime->start_time }}</p>
    <p><strong>Trạng thái:</strong> 
        @if($booking->status==='paid') Paid 
        @elseif($booking->status==='pending') Pending 
        @else Cancelled @endif
    </p>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mt-3">← Quay lại danh sách</a>
</div>
@endsection
