@extends('layouts.master')

@section('title')
Công nợ
@endsection

@section('content')
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('payments.update', $data['payment_list']->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="username">Mã sinh viên:</label>
        <select class="form-control js-example-basic-single" id="username" name="username">
            @foreach($data['account_list'] as $account)
            <option value="{{ $account->username }}">{{ $account->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="month">Tháng:</label>
        <select class="form-control" id="month" name="month">
            <option value="Tháng 1" {{ $data['payment_list']->month_of == 'Tháng 1' ? 'selected' : '' }}>Tháng 1</option>
            <option value="Tháng 2" {{ $data['payment_list']->month_of == 'Tháng 2' ? 'selected' : '' }}>Tháng 2</option>
            <option value="Tháng 3" {{ $data['payment_list']->month_of == 'Tháng 3' ? 'selected' : '' }}>Tháng 3</option>
            <option value="Tháng 4" {{ $data['payment_list']->month_of == 'Tháng 4' ? 'selected' : '' }}>Tháng 4</option>
            <option value="Tháng 5" {{ $data['payment_list']->month_of == 'Tháng 5' ? 'selected' : '' }}>Tháng 5</option>
            <option value="Tháng 6" {{ $data['payment_list']->month_of == 'Tháng 6' ? 'selected' : '' }}>Tháng 6</option>
            <option value="Tháng 7" {{ $data['payment_list']->month_of == 'Tháng 7' ? 'selected' : '' }}>Tháng 7</option>
            <option value="Tháng 8" {{ $data['payment_list']->month_of == 'Tháng 8' ? 'selected' : '' }}>Tháng 8</option>
            <option value="Tháng 9" {{ $data['payment_list']->month_of == 'Tháng 9' ? 'selected' : '' }}>Tháng 9</option>
            <option value="Tháng 10" {{ $data['payment_list']->month_of == 'Tháng 10' ? 'selected' : '' }}>Tháng 10</option>
            <option value="Tháng 11" {{ $data['payment_list']->month_of == 'Tháng 11' ? 'selected' : '' }}>Tháng 11</option>
            <option value="Tháng 12" {{ $data['payment_list']->month_of == 'Tháng 12' ? 'selected' : '' }}>Tháng 12</option>
        </select>
    </div>
    <div class="form-group">
        <label for="amount">Số tiền:</label>
        <input type="number" class="form-control" id="amount" name="amount" value="{{ $data['payment_list']->amount }}">
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