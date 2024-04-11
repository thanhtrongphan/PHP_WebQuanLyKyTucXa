@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form method="POST" action="{{ route('users.updatePassword', $data->id) }}">
    @csrf
    <div>
        <label for="password">Old Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="new_pass">New Password</label>
        <input id="new_pass" type="password" name="new_pass" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="new_pass_confirm">Confirm New Password</label>
        <input id="new_pass_confirm" type="password" name="new_pass_confirm" required>
    </div>

    <div>
        <button type="submit">Change Password</button>
    </div>
</form>
@endsection