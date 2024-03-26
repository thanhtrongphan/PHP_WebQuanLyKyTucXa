@extends('layouts.master')

@section('title')
Show Data
@endsection

@section('content')
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code">Code:</label>
        <input type="text" class="form-control" id="code" name="code" >
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    <div class="form-group">
        <label for="department">Department:</label>
        <input type="text" class="form-control" id="department" name="department">
    </div>
    <div class="form-group">
        <label for="course">Course:</label>
        <input type="text" class="form-control" id="course" name="course">
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="gender_male" name="gender" value="Nam">
            <label class="form-check-label" for="gender_male">Nam</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="gender_female" name="gender" value="Nữ">
            <label class="form-check-label" for="gender_female">Nữ</label>
        </div>
    </div>
    <div class="form-group">
        <label for="contact">Contact:</label>
        <input type="text" class="form-control" id="contact" name="contact" >
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" >
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" >
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('students.index') }}" class="btn btn-danger">Cancel</a>
</form>

    
@endsection