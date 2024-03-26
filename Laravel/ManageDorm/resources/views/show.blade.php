@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
    <?php
        printf($data);
    ?>
@endsection