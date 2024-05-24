@extends('layouts.master')

@section('title')
Chi tiết phòng
@endsection

@section('content')
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Ngày đăng ký</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $register)
        <tr>
            <td>{{ $register->username }}</td>
            <td>{{ $register->date }}</td>

            <td>
                <form action="{{ route('registers.destroy', $register->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xoá sinh viên khỏi phòng</button>
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
<a href="{{ route('registers.index') }}">Trở lại</a>

@endsection