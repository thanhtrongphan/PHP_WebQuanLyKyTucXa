@extends('layouts.master')

@section('title')
Công nợ
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('payments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code">Mã sinh viên:</label>
        <select class="form-control js-example-basic-single" id="code" name="code">
            @foreach($data as $student)
            <option value="{{ $student->username }}">{{ $student->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="month">Tháng:</label>
        <select class="form-control" id="month" name="month">
            <option value="Tháng 1">Tháng 1</option>
            <option value="Tháng 2">Tháng 2</option>
            <option value="Tháng 3">Tháng 3</option>
            <option value="Tháng 4">Tháng 4</option>
            <option value="Tháng 5">Tháng 5</option>
            <option value="Tháng 6">Tháng 6</option>
            <option value="Tháng 7">Tháng 7</option>
            <option value="Tháng 8">Tháng 8</option>
            <option value="Tháng 9">Tháng 9</option>
            <option value="Tháng 10">Tháng 10</option>
            <option value="Tháng 11">Tháng 11</option>
            <option value="Tháng 12">Tháng 12</option>
        </select>
    </div>
    <div class="form-group">
        <label for="amount">Số tiền:</label>
        <input type="number" class="form-control" id="amount" name="amount">
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
    <a href="{{ route('payments.index') }}" class="btn btn-danger">Trở lại</a>
</form>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection