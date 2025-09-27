<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'QHCINEMA')</title>

	<!-- Bootstrap & Fonts -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/global.css') }}" rel="stylesheet">
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Top Bar -->
    <section id="top">
        <div class="container">
            <div class="row top_1">
                <div class="col-md-3">
                    <div class="top_1l pt-1">
                        <h3 class="mb-0">
                            <a class="text-white" href="{{ url('/') }}">
                                <i class="fa fa-video-camera col_red me-1"></i> Q&HCINEMA
                            </a>
                        </h3>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top_1m">
                        <div class="input-group">
                            <input type="text" class="form-control bg-black" placeholder="Tìm phim...">
                            <button class="btn text-white bg_red rounded-0 border-0" type="button">Tìm</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top_1r text-end">
                        <ul class="social-network social-circle mb-0">
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navbar Auth -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" id="navbar_sticky">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="fa fa-video-camera col_red me-1"></i> QHCINEMA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">🔑 Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">📝 Đăng ký</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <span class="nav-link">👋 Xin chào, <strong>{{ Auth::guard('customer')->user()->name ?? Auth::user()->name }}</strong></span>
                        </li>

                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">🏠 Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.movies.index') }}">🎞️ Quản lý phim</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.theaters.index') }}">🏢 Quản lý rạp</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.rooms.index') }}">📺 Quản lý phòng</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.showtimes.index') }}">🕒 Quản lý suất chiếu</a></li>
                        @elseif(Auth::guard('customer')->check())
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.dashboard') }}">🏠 Trang khách hàng</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.movies.index') }}">🎞️ Đặt vé</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer.history') }}">📜 Lịch sử</a></li>
                        @endif

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">🚪 Đăng xuất</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
