@extends('layouts.master')

@section('title')
    Show Data
@endsection

@section('content')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <!-- Add mo`re columns as needed -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->name ?></td>
            <!-- Add more columns as needed -->
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
@endsection