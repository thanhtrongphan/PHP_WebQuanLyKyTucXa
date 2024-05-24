@extends('layouts.master')

@section('title')
    Đổi mật khẩu
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form method="POST" action="{{ route('users.updatePassword', $data->id) }}">
    @csrf
    <div>
        <label for="password">Mật khẩu cũ: </label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="new_pass">Mật khẩu mới: </label>
        <input id="new_pass" type="password" name="new_pass" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="new_pass_confirm">Xác nhận mật khẩu mới: </label>
        <input id="new_pass_confirm" type="password" name="new_pass_confirm" required>
    </div>

    <div>
        <button type="submit">Cập nhật mật khẩu</button>
    </div>
</form>
@endsection