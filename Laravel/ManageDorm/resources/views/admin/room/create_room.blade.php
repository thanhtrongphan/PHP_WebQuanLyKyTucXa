@extends('layouts.master')

@section('title')
Phòng
@endsection

@section('content')

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="id_dorm">Ký túc xá:</label>
        <select class="form-control js-example-basic-single" id="id_dorm" name="id_dorm">
            @foreach($data as $dorm)
            <option value="{{ $dorm->id }}">{{ $dorm->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="name">Tên phòng:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="slots">Số người tối đa:</label>
        <input type="number" class="form-control" id="slots" name="slots" min="1" step="1">
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" class="form-control" id="price" name="price" min="1" step="1">
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
    <a href="{{ route('rooms.index') }}" class="btn btn-danger">Trở lại</a>
</form>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection