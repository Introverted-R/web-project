<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
</head>
<body>
    @include('admin.header')
    <div class="d-flex">
        @include('admin.sidebar')
        <main class="page-content">
            @yield('content')
        </main>
    </div>
    @include('admin.footer')
</body>

</html>
