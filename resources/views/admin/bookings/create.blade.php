@extends('layouts.app')

@section('title', 'Tạo Booking mới')

@section('content')
<div class="container mt-4">
    <h1>Tạo Booking mới</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.bookings.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Khách hàng</label>
            <select name="user_id" class="form-select" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Suất chiếu</label>
            <select name="showtime_id" class="form-select" required>
                @foreach($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">
                        {{ $showtime->movie->title }} | {{ $showtime->room->name }} | {{ $showtime->start_time }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ghế (ngăn cách bằng dấu , nếu nhiều ghế)</label>
            <input type="text" name="seat_number" class="form-control" placeholder="1,2,3" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select" required>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Tạo Booking</button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
