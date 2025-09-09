@extends('layouts.app')

@section('title', 'Chọn Ghế')

@section('content')
<h1 class="mb-4">Chọn Ghế</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="d-flex flex-wrap gap-2">
    @foreach($tickets as $ticket)
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            <button type="submit" class="btn btn-success">
                Ghế {{ $ticket->seat_number }}
            </button>
        </form>
    @endforeach
</div>

<a href="{{ route('booking.selectShowtime', $showtime_id) }}" class="btn btn-link mt-3">← Quay lại chọn suất</a>
@endsection
