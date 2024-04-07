@extends('layouts.master')

@section('title')
Show Data
@endsection

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Date</th>
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
<a href="{{ route('registers.index') }}">Back</a>
    
@endsection