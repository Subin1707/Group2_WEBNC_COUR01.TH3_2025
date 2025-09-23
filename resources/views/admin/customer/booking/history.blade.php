@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📜 Lịch sử đặt vé</h2>

    @if($bookings->isEmpty())
        <p>Bạn chưa đặt vé nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Phim</th>
                    <th>Rạp</th>
                    <th>Phòng</th>
                    <th>Suất chiếu</th>
                    <th>Ghế</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->showtime->movie->title }}</td>
                        <td>{{ $booking->showtime->room->theater->name }}</td>
                        <td>{{ $booking->showtime->room->name }}</td>
                        <td>{{ $booking->showtime->start_time }}</td>
                        <td>{{ $booking->seat->seat_number }}</td>
                        <td>
                            @if($booking->status == 'reserved')
                                <span class="badge bg-success">Đã đặt</span>
                            @else
                                <span class="badge bg-secondary">{{ $booking->status }}</span>
                            @endif
                        </td>
                        <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
