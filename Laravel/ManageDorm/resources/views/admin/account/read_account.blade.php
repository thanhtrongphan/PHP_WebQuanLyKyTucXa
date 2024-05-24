@extends('layouts.master')

@section('title')
Tài khoản
@endsection

@section('content')
<?php
    // get data from controller return view('admin.student.read_student', ['data' => $data]);
    $data = $data ?? [];
?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <a href="{{ route('accounts.create') }}" class="btn btn-primary">Thêm</a>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="col-md-auto">Mã sinh viên</th>
                <th class="col-md-auto">Username</th>
                <th class="col-md-auto">Password</th>
                <th class="col-md-auto">Avatar</th>
                <th class="col-md-auto">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                
                <td>{{ $item->code }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->avatar }}</td>
                <td>
                    <a href="{{ route('accounts.show', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('accounts.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</div>
@endsection