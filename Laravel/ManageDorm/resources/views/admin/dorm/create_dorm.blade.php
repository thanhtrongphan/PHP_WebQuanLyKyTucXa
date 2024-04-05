@extends('layouts.master')

@section('title')
Show Data
@endsection

@section('content')
<form action="{{ route('dorms.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('dorms.index') }}" class="btn btn-danger">Cancel</a>
</form>

    
@endsection