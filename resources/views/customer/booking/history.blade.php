@extends('layouts.app')

@section('title', 'Lịch sử đặt vé')

@section('content')
<div class="container">
    <h1>📜 Lịch sử đặt vé</h1>

    @if($bookings->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Phim</th>
                    <th>Rạp / Phòng</th>
                    <th>Ghế</th>
                    <th>Thời gian</th>
                    <th>Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->showtime->movie->title }}</td>
                        <td>{{ $booking->showtime->room->theater->name ?? 'Chưa xác định' }} / {{ $booking->showtime->room->name }}</td>
                        <td>{{ $booking->seat_number ?? $booking->seat_id }}</td>
                        <td>{{ $booking->showtime->start_time }}</td>
                        <td>{{ $booking->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Chưa có booking nào.</p>
    @endif

    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary mt-3">← Quay lại Dashboard</a>
</div>
@endsection
