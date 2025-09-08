@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm vé</h2>

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

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Suất chiếu:</label>
            <select name="showtime_id" required>
                @foreach($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">{{ $showtime->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Số ghế:</label>
            <input type="text" name="seat_number" value="{{ old('seat_number') }}" required>
        </div>

        <div class="mb-3">
            <label>Giá:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="mb-3">
            <label>Trạng thái:</label>
            <select name="status">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>available</option>
                <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>booked</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Lưu</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
    </form>
</div>
@endsection
