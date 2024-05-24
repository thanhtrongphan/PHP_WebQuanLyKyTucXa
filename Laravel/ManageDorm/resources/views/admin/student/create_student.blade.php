@extends('layouts.master')

@section('title')
Sinh viên
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code">Mã sinh viên:</label>
        <input type="text" class="form-control" id="code" name="code" require >
    </div>
    <div class="form-group">
        <label for="name">Họ tên:</label>
        <input type="text" class="form-control" id="name" name="name" require>
    </div>
    <div class="form-group">
        <label for="department">Khoa:</label>
        <input type="text" class="form-control" id="department" name="department" require>
    </div>
    <div class="form-group">
        <label for="course">Nghành:</label>
        <input type="text" class="form-control" id="course" name="course" require>
    </div>
    <div class="form-group">
        <label for="gender">Giới tính:</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="gender_male" name="gender" value="Nam" >
            <label class="form-check-label" for="gender_male">Nam</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="gender_female" name="gender" value="Nữ">
            <label class="form-check-label" for="gender_female">Nữ</label>
        </div>
    </div>
    <div class="form-group">
        <label for="contact">Số điện thoại:</label>
        <input type="text" class="form-control" id="contact" name="contact" require>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" require>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ:</label>
        <input type="text" class="form-control" id="address" name="address" require>
    </div>
    <button type="submit" class="btn btn-primary">Tạo sinh viên</button>
    <a href="{{ route('students.index') }}" class="btn btn-danger">Trở lại</a>
</form>

    
@endsection