@extends('layouts.admin')

@section('title', 'Thêm phòng mới')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">➕ Thêm phòng mới</h1>

    <form method="POST" action="{{ route('admin.rooms.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên phòng</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rạp</label>
            <select name="theater_id" class="form-select" required>
                <option value="">-- Chọn rạp --</option>
                @foreach($theaters as $theater)
                    <option value="{{ $theater->id }}">{{ $theater->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tổng số ghế</label>
            <input type="number" name="total_seats" class="form-control" value="50" required>
        </div>

        <button type="submit" class="btn btn-success">✅ Thêm phòng</button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">← Quay lại</a>
    </form>
</div>
@endsection
