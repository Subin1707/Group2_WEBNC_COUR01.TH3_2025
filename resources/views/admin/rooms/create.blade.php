@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm phòng chiếu</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="theater_id">Rạp</label>
            <select name="theater_id" class="form-control">
                @foreach ($theaters as $theater)
                    <option value="{{ $theater->id }}">{{ $theater->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name">Tên phòng</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="type">Loại phòng</label>
            <input type="text" name="type" class="form-control">
        </div>
        <div class="mb-3">
            <label for="total_seats">Tổng số ghế</label>
            <input type="number" name="total_seats" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
@endsection
