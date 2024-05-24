@extends('layouts.master')

@section('title')
Ký túc xá
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('dorms.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên:</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    
    <button type="submit" class="btn btn-primary">Tạo</button>
    <a href="{{ route('dorms.index') }}" class="btn btn-danger">Trở lại</a>
</form>

    
@endsection