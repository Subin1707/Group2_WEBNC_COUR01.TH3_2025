@extends('layouts.admin')

@section('title', 'Sửa phòng')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">✏️ Sửa phòng</h1>

    <form method="POST" action="{{ route('admin.rooms.update', $room) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên phòng</label>
            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rạp</label>
            <select name="theater_id" class="form-select" required>
                <option value="">-- Chọn rạp --</option>
                @foreach($theaters as $theater)
                    <option value="{{ $theater->id }}" {{ $room->theater_id == $theater->id ? 'selected' : '' }}>
                        {{ $theater->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tổng số ghế</label>
            <input type="number" name="total_seats" class="form-control" value="{{ $room->total_seats }}" required>
        </div>

        <button type="submit" class="btn btn-warning">💾 Cập nhật</button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">← Quay lại</a>
    </form>
</div>
@endsection
