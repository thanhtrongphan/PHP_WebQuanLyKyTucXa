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
<form action="{{ route('accounts.update', $data['accountData']->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="code">Username:</label>
        <select class="form-control js-example-basic-single" id="code" name="code">
            @foreach($data['student_list'] as $student)
            <option value="{{ $student->code }}">{{ $student->code }}</option>
            @endforeach
        </select>
    </div>
    <!-- <hidden id="id" name="id" value="{{ $data['accountData']->id }}"> -->
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ $data['accountData']->password }}">
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện:</label>
        <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $data['accountData']->avatar }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('accounts.index') }}" class="btn btn-danger">Trở lại</a>
</form>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection