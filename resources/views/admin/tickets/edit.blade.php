@extends('layouts.app')

@section('content')
<h1>Chỉnh sửa vé: {{ $ticket->seat_number }}</h1>

<form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Suất chiếu:</label><br>
    <select name="showtime_id" required>
        @foreach($showtimes as $showtime)
            <option value="{{ $showtime->id }}" @if($showtime->id == $ticket->showtime_id) selected @endif>
                {{ $showtime->movie->title ?? 'Không xác định' }} - {{ $showtime->start_time }}
            </option>
        @endforeach
    </select><br><br>

    <label>Ghế:</label><br>
    <input type="text" name="seat_number" value="{{ old('seat_number', $ticket->seat_number) }}" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" value="{{ old('price', $ticket->price) }}" required><br><br>

    <label>Trạng thái:</label><br>
    <select name="status" required>
        <option value="available" @if($ticket->status == 'available') selected @endif>Available</option>
        <option value="sold" @if($ticket->status == 'sold') selected @endif>Sold</option>
    </select><br><br>

    <button type="submit">💾 Cập nhật</button>
    <a href="{{ route('admin.tickets.index') }}">⬅️ Quay lại</a>
</form>
@endsection
