<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .auth-card {
            max-width: 420px;
            margin: auto;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm p-4 auth-card">
            <div class="text-center mb-4">
                <a href="/">
                    <img src="{{ asset('logo.png') }}" alt="Logo" width="80">
                </a>
            </div>

            {{ $slot }}
        </div>
    </div>
</body>
</html>
