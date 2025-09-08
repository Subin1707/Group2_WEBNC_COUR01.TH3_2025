@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sửa vé #{{ $ticket->id }}</h2>

    {{-- Hiển thị lỗi validate --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Suất chiếu:</label>
            <select name="showtime_id" required>
                @foreach($showtimes as $showtime)
                    <option value="{{ $showtime->id }}" {{ $ticket->showtime_id == $showtime->id ? 'selected' : '' }}>
                        {{ $showtime->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Số ghế:</label>
            <input type="text" name="seat_number" value="{{ $ticket->seat_number }}" required>
        </div>

        <div class="mb-3">
            <label>Giá:</label>
            <input type="number" step="0.01" name="price" value="{{ $ticket->price }}" required>
        </div>

        <div class="mb-3">
            <label>Trạng thái:</label>
            <select name="status">
                <option value="available" {{ $ticket->status == 'available' ? 'selected' : '' }}>available</option>
                <option value="booked" {{ $ticket->status == 'booked' ? 'selected' : '' }}>booked</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Cập nhật</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
    </form>
</div>
@endsection
