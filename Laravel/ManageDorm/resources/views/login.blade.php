@extends('layouts.master')

@section('title')
Đăng nhập
@endsection

@section('content')

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection