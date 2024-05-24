@extends('layouts.master')

@section('title')
Tài khoản
@endsection

@section('content')
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
<form action="{{ route('accounts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="code">Username:</label>
        <select class="form-control js-example-basic-single" id="code" name="code">
            @foreach($data as $student)
            <option value="{{ $student->code }}">{{ $student->code }}</option>
            @endforeach
        </select>
    </div>
    
    <!-- <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username">
    </div> -->
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="image">Ảnh đại diện:</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
    <a href="{{ route('accounts.index') }}" class="btn btn-danger">Trở lại</a>
</form>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection