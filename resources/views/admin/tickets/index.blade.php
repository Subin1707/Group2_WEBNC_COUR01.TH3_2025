@extends('layouts.app')

@section('content')
<h1>Danh sách vé</h1>

<a href="{{ route('admin.tickets.create') }}">➕ Tạo vé mới</a>

@if($tickets->count())
    <ul>
        @foreach($tickets as $ticket)
            <li>
                {{ $ticket->showtime->movie->title ?? 'Không xác định' }} -
                Ghế: {{ $ticket->seat_number }} -
                Giá: {{ $ticket->price }} -
                Trạng thái: {{ $ticket->status }}

                | <a href="{{ route('admin.tickets.edit', $ticket->id) }}">✏️ Sửa</a>

                | <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc muốn xóa vé này?')">🗑️ Xóa</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>Chưa có vé nào.</p>
@endif
@endsection
