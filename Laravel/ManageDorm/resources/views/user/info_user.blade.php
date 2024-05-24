@extends('layouts.master')

@section('title')
    Thong tin sinh vien
@endsection

@section('content')
<div>
    <h1>Thông tin sinh viên</h1>
    <p>Mã sinh viên: {{ $data->code }}</p>
    <p>Tên sinh viên: {{ $data->name }}</p>
    <p>Khoa: {{ $data->department }}</p>
    <p>Nghành: {{ $data->course }}</p>
    <p>Giới tính: {{ $data->gender }}</p>
    <p>SDT: {{ $data->contact }}</p>
    <p>Email: {{ $data->email }}</p>
    <p>Địa chỉ: {{ $data->address }}</p>
</div>
<button><a href="{{ route('users.show', $data->id) }}">Chỉnh sửa thông tin</a></button>
@endsection