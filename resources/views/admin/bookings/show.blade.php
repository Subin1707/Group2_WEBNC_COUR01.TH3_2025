<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🎫 Chi tiết Booking</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">🎫 Chi tiết Booking</h1>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Thông tin khách hàng</h2>
        <p><strong>Tên:</strong> {{ $booking->customer->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $booking->customer->email ?? 'N/A' }}</p>
        <p><strong>Điện thoại:</strong> {{ $booking->customer->phone ?? 'N/A' }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4">Thông tin phim & lịch chiếu</h2>
        <p><strong>Phim:</strong> {{ $booking->showtime->movie->title }}</p>
        <p><strong>Rạp:</strong> {{ $booking->showtime->room->theater->name }}</p>
        <p><strong>Phòng:</strong> {{ $booking->showtime->room->name }}</p>
        <p><strong>Thời gian:</strong> {{ $booking->showtime->start_time }}</p>
        <p><strong>Số ghế:</strong> {{ $booking->seat_number }}</p>
        <p><strong>Trạng thái:</strong> {{ ucfirst($booking->status) }}</p>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('admin.bookings.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            ← Quay lại
        </a>

        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa booking này?');">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Xóa Booking
            </button>
        </form>
    </div>
</div>
</body>
</html>
