@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <!-- Add mo`re columns as needed -->
        </tr>
    </thead>
    <tbody>
        <p>Student Data</p>
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->password }}</td>
            <!-- Add more columns as needed -->
        </tr>
    </tbody>
</table>
@endsection