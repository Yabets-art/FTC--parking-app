<!-- resources/views/admin/car_spaces/create.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="my-4">Add New Car Space</h2>

    <form action="{{ route('admin.car_spaces.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="availability" required>
                <option value="1">Available</option>
                <option value="0">Occupied</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Car Space</button>
        <a href="{{ route('admin.car_spaces.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
