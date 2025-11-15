@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage users in the system.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Approvals</h5>
                        <p class="card-text">Review and approve car registrations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Car Spaces</h5>
                        <p class="card-text">Manage car space reservations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

