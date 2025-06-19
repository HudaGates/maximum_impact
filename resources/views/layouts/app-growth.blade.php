<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Business Growth')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
    body {
        background-image: url('{{ asset('images/background-growth.png') }}');
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }
</style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
