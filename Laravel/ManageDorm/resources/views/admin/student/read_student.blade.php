@extends('layouts.master')

@section('title')
    Sinh viên
@endsection

@section('content')
<?php
    // get data from controller return view('admin.student.read_student', ['data' => $data]);
    $data = $data ?? [];
?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm sinh viên</a>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="col-md-auto">Mã sinh viên</th>
                <th class="col-md-auto">Họ tên</th>
                <th class="col-md-auto">Khoa</th>
                <th class="col-md-auto">Nghành</th>
                <th class="col-md-auto">Giới tính</th>
                <th class="col-md-auto">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                
                <td>{{ $item->code }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->department }}</td>
                <td>{{ $item->course }}</td>
                <td>{{ $item->gender}}</td>
                <td>
                    <a href="{{ route('students.show', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $item->id) }}" method="POST" style="display: inline;">
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