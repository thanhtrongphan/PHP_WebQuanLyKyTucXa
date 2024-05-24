@extends('layouts.master')

@section('title')
Chi tiết phòng
@endsection

@section('content')
<?php
    // get data from controller return view('admin.student.read_student', ['data' => $data]);
    $data = $data ?? [];
?>
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="col-md-auto">Tên ký túc xá</th>
                <th class="col-md-auto">Tên phòng</th>
                <th class="col-md-auto">Số lượng đã đăng ký</th>
                <th class="col-md-auto">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr> 
                <td>{{ $item->dorm_name }}</td>
                <td>{{ $item->room_name }}</td>
                <td>{{ $item->registered_slots }}/{{  $item->slots }}</td>
                <td>
                    <a href="{{ route('registers.show', $item->id) }}" class="btn btn-warning btn-sm">Xem chi tiết</a>
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