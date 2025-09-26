@extends('layouts.app')

@section('title', 'Đặt vé - ' . $showtime->movie->title)

@section('content')
<div class="container">
    <h1>🎟️ Đặt vé - {{ $showtime->movie->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Rạp:</strong> {{ $showtime->room->theater->name ?? 'Chưa xác định' }}</p>
            <p><strong>Phòng:</strong> {{ $showtime->room->name }}</p>
            <p><strong>Thời gian:</strong> {{ $showtime->start_time }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('customer.booking.store') }}">
        @csrf
        <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">

        <div class="card mb-3">
            <div class="card-body">
                <h5>Chọn ghế</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach(range(1, $showtime->room->total_seats ?? 50) as $seat)
                        <label class="btn btn-outline-primary">
                            <input type="checkbox" name="seats[]" value="{{ $seat }}" class="d-none">
                            {{ $seat }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">✅ Đặt vé</button>
        <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary">← Quay lại Dashboard</a>
    </form>
</div>
@endsection
