@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
@if(Session::get('auth') == 'admin')
    <h2>Welcome Admin</h2>
@endif
@endsection