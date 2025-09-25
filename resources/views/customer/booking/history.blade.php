@extends('layouts.app')

@section('content')
    <h1>Lịch sử đặt vé</h1>

    @if($bookings->count())
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Phim</th>
                    <th class="border border-gray-300 px-4 py-2">Rạp / Phòng</th>
                    <th class="border border-gray-300 px-4 py-2">Ghế</th>
                    <th class="border border-gray-300 px-4 py-2">Thời gian</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $booking->showtime->movie->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $booking->showtime->room->theater->name ?? 'Chưa xác định' }} / {{ $booking->showtime->room->name }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $booking->seat_number }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $booking->showtime->start_time }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $booking->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Chưa có booking nào.</p>
    @endif

    <a href="{{ route('customer.dashboard') }}" class="text-blue-600 mt-4 inline-block">← Quay lại Dashboard</a>
@endsection
