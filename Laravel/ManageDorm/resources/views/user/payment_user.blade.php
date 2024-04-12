@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
<table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-auto">Tháng</th>
                <th class="col-md-auto">Số tiền</th>
                <th class="col-md-auto">Trạng thái</th>
                <th class="col-md-auto">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                
                <td>{{ $item->month_of }}</td>
                <td>{{ $item->amount }}</td>
                <td>
                    @if($item->is_payment == 1)
                        Thanh toán
                    @else
                        Chưa thanh toán
                    @endif
                </td>
                <td><a href="#">Thanh toán</a></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection