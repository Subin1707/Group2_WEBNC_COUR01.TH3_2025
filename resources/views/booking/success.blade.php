@extends('layouts.app')

@section('title', 'Đặt Vé Thành Công')

@section('content')
<div class="alert alert-success text-center">
    <h2>Đặt vé thành công!</h2>
    <p>Cảm ơn bạn đã đặt vé.</p>
    <a href="{{ route('booking.selectMovie') }}" class="btn btn-primary mt-3">Đặt vé khác</a>
</div>
@endsection
