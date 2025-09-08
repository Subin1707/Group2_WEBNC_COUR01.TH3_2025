@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ Thêm Vé</h2>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Suất chiếu</label>
            <select name="showtime_id" class="form-control" required>
                <option value="">-- Chọn suất chiếu --</option>
                @foreach($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">Suất chiếu #{{ $showtime->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Số ghế</label>
            <input type="text" name="seat_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá vé</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-control" required>
                <option value="0">Chưa bán</option>
                <option value="1">Đã bán</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
