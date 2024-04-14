@extends('layouts.master')

@section('title')
Show Data
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('dorms.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('dorms.index') }}" class="btn btn-danger">Cancel</a>
</form>

    
@endsection