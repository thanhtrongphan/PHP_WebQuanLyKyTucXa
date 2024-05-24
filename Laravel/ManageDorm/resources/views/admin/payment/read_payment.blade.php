@extends('layouts.master')

@section('title')
Công nợ
@endsection

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <a href="{{ route('payments.create') }}" class="btn btn-primary">Tạo</a>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="col-md-auto">Mã sinh viên</th>
                <th class="col-md-auto">Tháng</th>
                <th class="col-md-auto">Số tiền</th>
                <th class="col-md-auto">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr> 
                <td>{{ $item->username }}</td>
                <td>{{ $item->month_of }}</td>
                <td>{{ $item->amount }}</td>
                <td>
                    <a href="{{ route('payments.show', $item->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                    <form action="{{ route('payments.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
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