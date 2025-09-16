@extends('layouts.app')

@section('content')
<div class="card">
    <h3>Đặt vé mới 🎬</h3>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <label>Khách hàng:</label>
        <select name="customer_id" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select><br><br>

        <label>Suất chiếu:</label>
        <select name="showtime_id" required>
            @foreach($showtimes as $showtime)
                <option value="{{ $showtime->id }}">Suất #{{ $showtime->id }}</option>
            @endforeach
        </select><br><br>

        <label>Ghế:</label>
        <select name="seat_id" required>
            @foreach($seats as $seat)
                <option value="{{ $seat->id }}">Ghế #{{ $seat->id }}</option>
            @endforeach
        </select><br><br>

        <label>Trạng thái:</label>
        <select name="status">
            <option value="reserved">Đã đặt</option>
            <option value="paid">Đã thanh toán</option>
            <option value="cancelled">Đã hủy</option>
        </select><br><br>

        <button type="submit">Xác nhận đặt vé ✅</button>
    </form>
</div>
@endsection
