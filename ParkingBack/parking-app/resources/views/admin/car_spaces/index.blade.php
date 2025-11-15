<!-- resources/views/admin/car_spaces/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="my-4">Manage Car Spaces</h2>
    <div class="d-flex justify-content-between mb-3">
        <div></div> <!-- Spacer for alignment -->
        <a href="{{ route('admin.car_spaces.create') }}" class="btn btn-primary">Add New Car Space</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Location</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carSpaces as $index => $carSpace)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $carSpace->location }}</td>
                <td>{{ $carSpace->capacity }}</td>
                <td>
                    <span class="badge {{ $carSpace->availability ? 'bg-success' : 'bg-danger' }}">
                        {{ $carSpace->availability ? 'Available' : 'Occupied' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.car_spaces.edit', $carSpace->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.car_spaces.destroy', $carSpace->id) }}" method="POST" style="display:inline-block;">
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
