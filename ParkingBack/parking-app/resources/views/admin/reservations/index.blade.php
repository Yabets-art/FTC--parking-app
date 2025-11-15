<!-- resources/views/admin/reservations/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Manage Reservations</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Car Space</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $index => $reservation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->carSpace->location }}</td>
                <td>
                    <span class="badge badge-{{ $reservation->status === 'approved' ? 'success' : ($reservation->status === 'rejected' ? 'danger' : 'warning') }}">
                        {{ ucfirst($reservation->status) }}
                    </span>
                </td>
                <td>
                    @if($reservation->status === 'pending')
                        <form action="{{ route('admin.reservations.approve', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('admin.reservations.reject', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    @else
                        <span class="text-muted">N/A</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('styles')
<style>
    .badge-success {
        background-color: #28a745;
    }
    .badge-danger {
        background-color: #dc3545;
    }
    .badge-warning {
        background-color: #ffc107;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
    }
</style>
@endsection
