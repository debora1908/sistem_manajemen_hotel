<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Five Star Horizon Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fa;
            font-family:Arial, Helvetica, sans-serif;
        }

        .navbar{
            background:#0E7490;
        }

        .navbar-brand{
            color:white !important;
            font-weight:bold;
        }

        footer{
            background:#0E7490;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:50px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            🏨 Five Star Horizon Hotel
        </a>

        <div class="ms-auto">

            <a href="{{ route('home') }}" class="btn btn-light btn-sm">
                Beranda
            </a>

        </div>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

<footer>

    © {{ date('Y') }} Five Star Horizon Hotel

</footer>

</body>
</html>