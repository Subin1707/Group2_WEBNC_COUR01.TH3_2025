@extends('layouts.app')

@section('content')
<div class="container">
    <h2>👁 Chi tiết Vé</h2>

    <p><strong>ID:</strong> {{ $ticket->id }}</p>
    <p><strong>Suất chiếu:</strong> {{ $ticket->showtime->id ?? 'N/A' }}</p>
    <p><strong>Số ghế:</strong> {{ $ticket->seat_number }}</p>
    <p><strong>Giá:</strong> {{ number_format($ticket->price, 0, ',', '.') }} đ</p>
    <p><strong>Khách hàng:</strong> {{ $ticket->customer_name ?? '-' }}</p>
    <p><strong>Trạng thái:</strong> {{ ucfirst($ticket->status) }}</p>

    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
</div>
@endsection
