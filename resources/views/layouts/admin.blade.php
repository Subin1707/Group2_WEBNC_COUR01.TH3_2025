<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-light">

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-end bg-white" id="sidebar-wrapper" style="min-width: 220px;">
        <div class="sidebar-heading border-bottom bg-primary text-white text-center py-3">
            🎬 Cinema Admin
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">🏠 Dashboard</a>
            <a href="{{ route('admin.movies.index') }}" class="list-group-item list-group-item-action">🎞️ Movies</a>
            <a href="{{ route('admin.theaters.index') }}" class="list-group-item list-group-item-action">🏢 Theaters</a>
            <a href="{{ route('admin.rooms.index') }}" class="list-group-item list-group-item-action">📺 Rooms</a>
            <a href="{{ route('admin.showtimes.index') }}" class="list-group-item list-group-item-action">🕒 Showtimes</a>
            <a href="{{ route('admin.bookings.index') }}" class="list-group-item list-group-item-action">🎫 Bookings</a>

            <form method="POST" action="{{ route('logout') }}" class="mt-3 px-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100">🚪 Logout</button>
            </form>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">☰</button>
                <span class="ms-3">Xin chào, <strong>{{ Auth::user()->name }}</strong></span>
            </div>
        </nav>

        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle sidebar
    const toggleButton = document.getElementById('sidebarToggle');
    const wrapper = document.getElementById('wrapper');
    toggleButton.addEventListener('click', () => {
        wrapper.classList.toggle('toggled');
    });
</script>
@stack('scripts')
</body>
</html>
