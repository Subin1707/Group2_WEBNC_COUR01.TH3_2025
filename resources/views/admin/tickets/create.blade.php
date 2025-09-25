@extends('layouts.app')

@section('content')
<h1>Tạo vé mới</h1>

<form action="{{ route('admin.tickets.store') }}" method="POST">
    @csrf

    <label>Suất chiếu:</label><br>
    <select name="showtime_id" required>
        <option value="">-- Chọn suất chiếu --</option>
        @foreach($showtimes as $showtime)
            <option value="{{ $showtime->id }}">
                {{ $showtime->movie->title ?? 'Không xác định' }} - {{ $showtime->start_time }}
            </option>
        @endforeach
    </select><br><br>

    <label>Ghế:</label><br>
    <input type="text" name="seat_number" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" required><br><br>

    <label>Trạng thái:</label><br>
    <select name="status" required>
        <option value="available">Available</option>
        <option value="sold">Sold</option>
    </select><br><br>

    <button type="submit">💾 Lưu</button>
    <a href="{{ route('admin.tickets.index') }}">⬅️ Quay lại</a>
</form>
@endsection
