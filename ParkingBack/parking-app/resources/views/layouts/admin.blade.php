<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50; /* Sidebar color */
            color: #ecf0f1; /* Sidebar text color */
            padding-top: 20px;
        }

        .sidenav h2 {
            color: #ecf0f1;
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #bdc3c7; /* Link text color */
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            background-color: #34495e; /* Hover color */
            color: white;
        }

        .content {
            margin-left: 250px; /* Same as the width of the sidenav */
            padding: 20px;
            width: 100%;
            background-color: #ecf0f1; /* Background color for content */
            min-height: 100vh; /* Ensure the content takes up the full height */
        }
    </style>
</head>
<body>

    <!-- Sidenav -->
    <div class="sidenav">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.reservations') }}">Reservation Approvals</a>
        <a href="{{ route('admin.car_spaces') }}">Car Spaces</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.cars.index') }}">Cars</a>
        <!-- Add more links as needed -->
    </div>

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
