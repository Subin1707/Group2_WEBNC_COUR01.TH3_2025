@extends('layouts.admin')

@section('title', 'Sửa Booking #' . $booking->id)

@section('content')
<div class="container mt-4">
    <h1>Sửa Booking #{{ $booking->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $booking->status==='pending'?'selected':'' }}>Pending</option>
                <option value="paid" {{ $booking->status==='paid'?'selected':'' }}>Paid</option>
                <option value="cancelled" {{ $booking->status==='cancelled'?'selected':'' }}>Cancelled</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ghế (ngăn cách bằng dấu ,)</label>
            <input type="text" name="seat_number" value="{{ is_array($booking->seat_number)?implode(',', $booking->seat_number):$booking->seat_number }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
