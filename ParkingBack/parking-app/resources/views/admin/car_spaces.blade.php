@extends('layouts.admin')

@section('content')
    <h1>Car Space Management</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Car</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->car->model }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td>
                        <!-- Add buttons or links for actions like editing or deleting reservations -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
