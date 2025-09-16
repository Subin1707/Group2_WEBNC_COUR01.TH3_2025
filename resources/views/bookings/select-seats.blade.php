@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">🎟 Chọn ghế cho suất chiếu</h2>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">

        <div class="grid grid-cols-8 gap-3 justify-center">
            @foreach($seats as $seat)
                <label class="cursor-pointer">
                    <input type="checkbox" name="seats[]" value="{{ $seat->id }}"
                        {{ $seat->status != 'available' ? 'disabled' : '' }}
                        class="hidden peer">
                    
                    <div class="w-12 h-12 flex items-center justify-center rounded-lg
                        {{ $seat->status == 'available' ? 'bg-green-500 hover:bg-green-600 peer-checked:bg-blue-500' : '' }}
                        {{ $seat->status == 'booked' ? 'bg-red-500 cursor-not-allowed' : '' }}
                        {{ $seat->status == 'maintenance' ? 'bg-gray-400 cursor-not-allowed' : '' }}">
                        {{ $seat->seat_number }}
                    </div>
                </label>
            @endforeach
        </div>

        <div class="text-center mt-6">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Xác nhận đặt vé
            </button>
        </div>
    </form>
</div>
@endsection
