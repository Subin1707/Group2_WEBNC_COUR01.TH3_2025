@extends('layouts.app')

@section('content')
<h1>Chi tiết vé: {{ $ticket->seat_number }}</h1>

<p><strong>Phim:</strong> {{ $ticket->showtime->movie->title ?? 'Không xác định' }}</p>
<p><strong>Suất chiếu:</strong> {{ $ticket->showtime->start_time ?? 'Không xác định' }}</p>
<p><strong>Ghế:</strong> {{ $ticket->seat_number }}</p>
<p><strong>Giá:</strong> {{ $ticket->price }}</p>
<p><strong>Trạng thái:</strong> {{ $ticket->status }}</p>

<a href="{{ route('admin.tickets.index') }}">⬅️ Quay lại danh sách</a>
@endsection
