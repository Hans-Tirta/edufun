<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'News Site')</title>
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.css">
</head>

<body class="d-flex flex-column min-vh-100">
    @include('components.navbar')

    <main class="container my-5 flex-grow-1">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</body>

</html>
