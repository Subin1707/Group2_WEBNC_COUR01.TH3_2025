@extends('layouts.app')

@section('title', 'Danh sách Rạp')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Danh sách Rạp</h1>
    <a href="{{ route('theaters.create') }}" class="btn btn-primary">+ Thêm rạp</a>
</div>

{{-- Form tìm kiếm nâng cao --}}
<form method="GET" action="{{ route('theaters.index') }}" class="mb-3">
    <div class="row g-2">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control"
                   placeholder="Tìm theo tên / SĐT..." value="{{ $search }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="address" class="form-control"
                   placeholder="Tìm theo địa chỉ..." value="{{ $address }}">
        </div>
        <div class="col-md-3">
            <select name="region" class="form-select">
                <option value="">-- Chọn khu vực --</option>
                @foreach ($regions as $r)
                    <option value="{{ $r }}" {{ $region == $r ? 'selected' : '' }}>
                        {{ $r }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-outline-secondary" type="submit">Tìm</button>
            <a href="{{ route('theaters.index') }}" class="btn btn-outline-dark">Reset</a>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Tên rạp</th>
            <th>Địa chỉ</th>
            <th>Khu vực</th>
            <th>SĐT</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($theaters as $theater)
            <tr>
                <td>{{ $theater->id }}</td>
                <td>{{ $theater->name }}</td>
                <td>{{ $theater->address }}</td>
                <td>{{ $theater->region }}</td>
                <td>{{ $theater->phone }}</td>
                <td>
                    <a href="{{ route('theaters.show', $theater->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('theaters.edit', $theater->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('theaters.destroy', $theater->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Không có rạp nào</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Giữ nguyên điều kiện tìm kiếm khi phân trang --}}
{{ $theaters->appends(request()->all())->links() }}
@endsection
