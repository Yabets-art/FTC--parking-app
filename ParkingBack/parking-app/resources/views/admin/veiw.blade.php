<!-- resources/views/admin/reservations/index.blade.php -->
@extends('admin.layout')

@section('content')
<h2>Manage Reservations</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Car Space</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->user->name }}</td>
            <td>{{ $reservation->carSpace->location }}</td>
            <td>{{ $reservation->status }}</td>
            <td>
                <form action="{{ route('admin.reservations.approve', $reservation->id) }}" method="POST">
                    @csrf
                    <button type="submit">Approve</button>
                </form>
                <form action="{{ route('admin.reservations.reject', $reservation->id) }}" method="POST">
                    @csrf
                    <button type="submit">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
