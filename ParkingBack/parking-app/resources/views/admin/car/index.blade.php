@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="my-4">Manage Cars</h2>

    <!-- Cars Table -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Car Model</th>
                <th>Vehicle Identification Number (VIN)</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $index => $car)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $car->car_model }}</td>
                <td>{{ $car->vehicle_identification_number }}</td>
                <td>{{ $car->user->name }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    {{-- <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                    <form action="#" method="POST" style="display:inline;">
                    {{-- <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline;"> --}}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
<style>
    .table {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-primary:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
@endpush
