@extends('layouts.app')

@section('title', 'Chi tiết Rạp')

@section('content')
<h2>Chi tiết Rạp</h2>
<p><strong>Tên:</strong> {{ $theater->name }}</p>
<p><strong>Địa chỉ:</strong> {{ $theater->address }}</p>
<p><strong>Khu vực:</strong> {{ $theater->region }}</p>
<p><strong>Số điện thoại:</strong> {{ $theater->phone }}</p>

<a href="{{ route('theaters.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection
