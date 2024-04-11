@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
    <?php
        print_r($data);
    ?>
@endsection