@extends('layouts.master')

@section('title')
Show Data
@endsection

@section('content')
<form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="id_dorm">Dorm name:</label>
        <select class="form-control js-example-basic-single" id="id_dorm" name="id_dorm">
            @foreach($data as $dorm)
            <option value="{{ $dorm->id }}">{{ $dorm->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="slots">Slots:</label>
        <input type="number" class="form-control" id="slots" name="slots" min="1" step="1">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" min="1" step="1">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('rooms.index') }}" class="btn btn-danger">Cancel</a>
</form>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection