@extends('layouts.master')

@section('title')
    Chỉnh sửa
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="contact">Số điện thoại</label>
        <input type="contact" name="contact" id="contact" value="{{ $user->contact }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="address" name="address" id="address" value="{{ $user->address }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection