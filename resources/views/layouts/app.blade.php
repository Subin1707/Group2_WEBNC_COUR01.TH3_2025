<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Quản lý Rạp Chiếu Phim')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
        }
        /* Header */
        header {
            height: 60px;
            background-color: #212529;
            color: white;
            display: flex;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        /* Sidebar */
        .sidebar {
            height: calc(100vh - 100px); /* trừ header và footer */
            position: fixed;
            top: 60px; /* dưới header */
            left: 0;
            width: 220px;
            background-color: #343a40;
            padding-top: 20px;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: #ddd;
            margin: 5px 0;
        }
        .sidebar .nav-link.active, 
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
            border-radius: 6px;
        }
        /* Content */
        .content {
            margin-left: 240px; /* chừa chỗ cho sidebar */
            margin-top: 70px;  /* chừa chỗ cho header */
            margin-bottom: 50px; /* chừa chỗ cho footer */
            padding: 20px;
        }
        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px;
            background-color: #212529;
            color: white;
            text-align: center;
            line-height: 40px;
            font-size: 14px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h4 class="m-0">🎬 Quản lý Rạp Chiếu Phim</h4>
    </header>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('movies.index') }}" 
                   class="nav-link {{ request()->routeIs('movies.*') ? 'active' : '' }}">
                   🎥 Movies
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('theaters.index') }}" 
                   class="nav-link {{ request()->routeIs('theaters.*') ? 'active' : '' }}">
                   🏛 Theaters
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('showtimes.index') }}" 
                   class="nav-link {{ request()->routeIs('showtimes.*') ? 'active' : '' }}">
                   ⏰ Showtimes
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tickets.index') }}" 
                   class="nav-link {{ request()->routeIs('tickets.*') ? 'active' : '' }}">
                   🎟 Tickets
                </a>
            </li>
        </ul>
    </div>

    <!-- Nội dung chính -->
    <div class="content">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} - Rạp Chiếu Phim Laravel
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
