<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center font-bold text-xl text-gray-800">
                    🎬 Cinema
                </a>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <span class="mr-4 text-gray-600">Xin chào, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            Đăng xuất
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline mr-4">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="text-green-600 hover:underline">Đăng ký</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
