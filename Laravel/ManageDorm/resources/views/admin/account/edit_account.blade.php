@extends('layouts.master')

@section('title')
Show Data
@endsection

@section('content')
<form action="{{ route('accounts.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="code">Code:</label>
        <p>{{ $data->code }}</p>
    </div>
    <hidden id="id" name="id" value="{{ $data->id }}">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ $data->password }}">
    </div>
    <div class="form-group">
        <label for="avatar">Avatar:</label>
        <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $data->avatar }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('accounts.index') }}" class="btn btn-danger">Cancel</a>
</form>

    
@endsection