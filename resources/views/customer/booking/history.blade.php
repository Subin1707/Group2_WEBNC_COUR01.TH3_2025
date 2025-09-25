<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>📜 Lịch sử đặt vé</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-5xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">📜 Lịch sử đặt vé</h1>

    @if($bookings->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center">
            Chưa có booking nào.
        </div>
    @else
        <div class="space-y-4">
            @foreach($bookings as $booking)
                <div class="bg-white p-6 rounded shadow flex justify-between items-center">
                    <div>
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
                            @if($booking->status === 'paid')
                                <span class="text-green-600 font-semibold">✅ Paid</span>
                            @elseif($booking->status === 'pending')
                                <span class="text-yellow-600 font-semibold">⏳ Pending</span>
                            @else
                                <span class="text-red-600 font-semibold">❌ Cancelled</span>
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('customer.dashboard') }}" class="text-blue-600">← Quay lại Dashboard</a>
    </div>

</div>

</body>
</html>
