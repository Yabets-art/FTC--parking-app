<!-- resources/views/admin/approvals/index.blade.php -->
@extends('admin.layout')

@section('content')
<h1>Car Registration Approvals</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Model</th>
            <th>VIN</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->model }}</td>
                <td>{{ $car->vin }}</td>
                <td>
                    <form action="{{ route('admin.approve', $car->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                    </form>
                    <form action="{{ route('admin.reject', $car->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
