<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🎟️ Đặt vé - {{ $showtime->movie->title }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">🎟️ Đặt vé - {{ $showtime->movie->title }}</h1>

    <!-- Thông báo lỗi / success -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Thông tin showtime -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <p><strong>Phim:</strong> {{ $showtime->movie->title }}</p>
        <p><strong>Rạp:</strong> {{ $showtime->room->theater->name ?? 'Chưa xác định' }}</p>
        <p><strong>Phòng:</strong> {{ $showtime->room->name }}</p>
        <p><strong>Thời gian:</strong> {{ $showtime->start_time }}</p>
    </div>

    <!-- Form chọn ghế -->
    <form method="POST" action="{{ route('customer.booking.store') }}">
        @csrf
        <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">

        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="text-xl font-semibold mb-4">Chọn ghế</h2>

            <div class="grid grid-cols-8 gap-2">
                @foreach(range(1, $showtime->room->total_seats ?? 50) as $seat)
                    <label class="cursor-pointer">
                        <input type="checkbox" name="seats[]" value="{{ $seat }}" class="hidden peer">
                        <div class="w-10 h-10 flex items-center justify-center rounded border border-gray-400
                                    peer-checked:bg-green-500 peer-checked:text-white">
                            {{ $seat }}
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            ✅ Đặt vé
        </button>
    </form>

    <div class="mt-6">
        <a href="{{ route('customer.dashboard') }}" class="text-blue-600">← Quay lại Dashboard</a>
    </div>

</div>

</body>
</html>
