@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@else
    @if(Session::has('is_registered'))
    <div class="alert alert-danger">
        {{ Session::get('is_registered') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Room Name</th>
                <th>Registered Slots</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->registered_slots }} / {{ $room->max_slots }}</td>
                <td><a href="{{ route('users.registered', ['id_room' => $room->id]) }}">Register</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection