@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
<?php
    // get data from controller return view('admin.student.read_student', ['data' => $data]);
    $data = $data ?? [];
?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-auto">Dorm name</th>
                <th class="col-md-auto">Name room</th>
                <th class="col-md-auto">Slots</th>
                <th class="col-md-auto">Price</th>
                <th class="col-md-auto">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                
                <td>{{ $item->dorm_name }}</td>
                <td>{{ $item->room_name }}</td>
                <td>{{ $item->slots }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('rooms.show', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('rooms.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection