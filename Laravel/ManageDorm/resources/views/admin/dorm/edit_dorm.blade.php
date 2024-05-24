@extends('layouts.master')

@section('title')
Ký túc xá
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('dorms.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Tên:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('dorms.index') }}" class="btn btn-danger">Trở lại</a>
</form>

    
@endsection