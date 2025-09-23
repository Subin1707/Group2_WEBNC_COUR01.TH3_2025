@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🪑 Chọn ghế - {{ $showtime->movie->title }}</h2>

    <form action="{{ route('booking.confirm', $showtime->id) }}" method="POST">
        @csrf
        <div class="row">
            @foreach($seats as $seat)
                <div class="col-2 mb-2">
                    <label class="btn btn-outline-primary w-100 {{ in_array($seat->id, $bookedSeats) ? 'disabled' : '' }}">
                        <input type="radio" name="seat_id" value="{{ $seat->id }}" 
                               {{ in_array($seat->id, $bookedSeats) ? 'disabled' : '' }}> 
                        {{ $seat->seat_number }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success mt-3">Xác nhận đặt vé</button>
    </form>
</div>
@endsection
