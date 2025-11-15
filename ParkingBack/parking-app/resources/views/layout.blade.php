
<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Panel</h1>
            <nav>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Car Spaces</a></li>
                    <!-- Add other admin links here -->
                </ul>
            </nav>
        </header>
        
        <main>
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
