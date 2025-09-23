@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa phòng chiếu</h1>
    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="theater_id">Rạp</label>
            <select name="theater_id" class="form-control">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}" @if($room->theater_id == $theater->id) selected @endif>
                        {{ $theater->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name">Tên phòng</label>
            <input type="text" name="name" value="{{ $room->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="type">Loại phòng</label>
            <input type="text" name="type" value="{{ $room->type }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="total_seats">Tổng số ghế</label>
            <input type="number" name="total_seats" value="{{ $room->total_seats }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
