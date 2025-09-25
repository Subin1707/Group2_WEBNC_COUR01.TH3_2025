<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🎫 Quản lý Booking</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">🎫 Quản lý Booking</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Khách hàng</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Phim</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Rạp</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Phòng</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ghế</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Thời gian</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Trạng thái</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($bookings as $booking)
                    <tr>
                        <td class="px-6 py-4 text-sm">{{ $booking->id }}</td>
                        <td class="px-6 py-4 text-sm">{{ $booking->customer->name ?? 'Khách ẩn' }}</td>
                        <td class="px-6 py-4 text-sm">{{ $booking->showtime->movie->title }}</td>
                        <td class="px-6 py-4 text-sm">{{ $booking->showtime->room->theater->name ?? 'Chưa xác định' }}</td>
                        <td class="px-6 py-4 text-sm">{{ $booking->showtime->room->name }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if(is_array($booking->seat_number))
                                {{ implode(', ', $booking->seat_number) }}
                            @else
                                {{ $booking->seat_number }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $booking->showtime->start_time }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($booking->status === 'paid')
                                <span class="text-green-600 font-semibold">✅ Paid</span>
                            @elseif($booking->status === 'pending')
                                <span class="text-yellow-600 font-semibold">⏳ Pending</span>
                            @else
                                <span class="text-red-600 font-semibold">❌ Cancelled</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <!-- Thay đổi trạng thái -->
                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                                    <option value="paid" {{ $booking->status==='paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="pending" {{ $booking->status==='pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="cancelled" {{ $booking->status==='cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>

                            <!-- Xóa booking -->
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa booking này?')">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600">← Quay lại Dashboard</a>
    </div>

</div>

</body>
</html>
