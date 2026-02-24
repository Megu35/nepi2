<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #1e293b, #0f172a);
        }

        .navbar-custom .nav-link {
            color: #cbd5e1 !important;
            transition: 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff !important;
        }

        .navbar-custom .nav-link.active {
            color: #ffffff !important;
            border-bottom: 2px solid #38bdf8;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>