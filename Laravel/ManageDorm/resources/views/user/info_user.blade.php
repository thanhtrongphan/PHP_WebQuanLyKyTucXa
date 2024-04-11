@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
<div>
    <h1>Thông tin sinh viên</h1>
    <p>Code: {{ $data->code }}</p>
    <p>Name: {{ $data->name }}</p>
    <p>Department: {{ $data->department }}</p>
    <p>Course: {{ $data->course }}</p>
    <p>Gender: {{ $data->gender }}</p>
    <p>Contact: {{ $data->contact }}</p>
    <p>Email: {{ $data->email }}</p>
    <p>Address: {{ $data->address }}</p>
</div>
<button><a href="{{ route('users.show', $data->id) }}">Chỉnh sửa thông tin</a></button>
@endsection