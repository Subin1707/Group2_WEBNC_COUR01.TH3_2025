@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết Rạp</h1>
    <p><strong>Tên rạp:</strong> {{ $theater->name }}</p>
    <p><strong>Địa chỉ:</strong> {{ $theater->address }}</p>
    <p><strong>Khu vực:</strong> {{ $theater->region }}</p>
    <p><strong>Điện thoại:</strong> {{ $theater->phone }}</p>

    <a href="{{ route('theaters.index') }}" class="btn btn-primary">⬅ Quay lại</a>
</div>
@endsection

