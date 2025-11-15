<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Dashboard</title>
    <!-- Include your CSS files here -->
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>
    <!-- Include your JS files here -->
</body>
</html>
