<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Hotel Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .navbar{
            background:#0d6efd;
        }

        .navbar-brand,
        .navbar-text,
        .nav-link{
            color:white!important;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 0 10px rgba(0,0,0,.08);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="#">
            E-Hotel
        </a>

        <div class="ms-auto">

            <span class="navbar-text me-3">

                {{ Auth::user()->name }}

            </span>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">

                @csrf

                <button class="btn btn-light btn-sm">

                    Logout

                </button>

            </form>

        </div>

    </div>
</nav>

<div class="container py-4">

    {{ $slot }}

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>