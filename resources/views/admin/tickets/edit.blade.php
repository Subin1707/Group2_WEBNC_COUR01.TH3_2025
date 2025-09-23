@extends('layouts.app')

@section('content')
<div class="container">
    <h2>✏ Sửa Vé</h2>

    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Suất chiếu</label>
            <select name="showtime_id" class="form-control" required>
                @foreach($showtimes as $showtime)
                    <option value="{{ $showtime->id }}" {{ $ticket->showtime_id == $showtime->id ? 'selected' : '' }}>
                        Suất chiếu #{{ $showtime->id }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Số ghế</label>
            <input type="text" name="seat_number" class="form-control" value="{{ $ticket->seat_number }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá vé</label>
            <input type="number" name="price" class="form-control" value="{{ $ticket->price }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-control" required>
                <option value="0" {{ $ticket->status == 0 ? 'selected' : '' }}>Chưa bán</option>
                <option value="1" {{ $ticket->status == 1 ? 'selected' : '' }}>Đã bán</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route
