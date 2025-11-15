<!-- resources/views/admin/car_spaces/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Car Space</h2>

    <form action="{{ route('admin.car_spaces.update', $carSpace->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $carSpace->location) }}" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $carSpace->capacity) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="availability" required>
                <option value="1" {{ $carSpace->availability ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$carSpace->availability ? 'selected' : '' }}>Occupied</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Car Space</button>
        <a href="{{ route('admin.car_spaces.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
