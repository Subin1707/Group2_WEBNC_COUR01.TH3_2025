<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Welcome Card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">Xin chào, {{ Auth::user()->name }}</h3>
                <p class="mt-2 text-gray-600">
                    Chào mừng bạn đến hệ thống đặt vé 🎬. Hãy chọn phim và đặt vé ngay!
                </p>
            </div>

            {{-- Booking Quick Actions --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-indigo-500 text-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg">🎥 Đặt vé</h4>
                    <p class="mt-2">Xem danh sách phim đang chiếu và đặt vé nhanh chóng.</p>
                    <a href="{{ route('customer.booking.index') }}" 
                       class="mt-4 inline-block px-4 py-2 bg-white text-indigo-600 rounded-lg font-medium hover:bg-gray-100">
                        Bắt đầu
                    </a>
                </div>

                <div class="bg-green-500 text-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg">🧾 Lịch sử đặt vé</h4>
                    <p class="mt-2">Theo dõi các vé đã đặt và chi tiết giao dịch.</p>
                    <a href="{{ route('customer.history') }}" 
                       class="mt-4 inline-block px-4 py-2 bg-white text-green-600 rounded-lg font-medium hover:bg-gray-100">
                        Xem lịch sử
                    </a>
                </div>

                <div class="bg-yellow-500 text-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg">⚙️ Tài khoản</h4>
                    <p class="mt-2">Chỉnh sửa thông tin cá nhân và mật khẩu.</p>
                    <a href="{{ route('profile.edit') }}" 
                       class="mt-4 inline-block px-4 py-2 bg-white text-yellow-600 rounded-lg font-medium hover:bg-gray-100">
                        Cập nhật
                    </a>
                </div>
            </div>

            {{-- Movie Suggestion / Banner --}}
            <div class="bg-white rounded-xl shadow p-6 mt-6">
                <h4 class="font-semibold text-lg text-gray-800">🎬 Phim nổi bật</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    {{-- Demo (sau này lấy từ DB movies) --}}
                    <div class="rounded-lg overflow-hidden shadow hover:shadow-md">
                        <img src="https://via.placeholder.com/300x200?text=Movie+1" alt="Movie 1" class="w-full">
                        <div class="p-2 text-center font-medium">Movie 1</div>
                    </div>
                    <div class="rounded-lg overflow-hidden shadow hover:shadow-md">
                        <img src="https://via.placeholder.com/300x200?text=Movie+2" alt="Movie 2" class="w-full">
                        <div class="p-2 text-center font-medium">Movie 2</div>
                    </div>
                    <div class="rounded-lg overflow-hidden shadow hover:shadow-md">
                        <img src="https://via.placeholder.com/300x200?text=Movie+3" alt="Movie 3" class="w-full">
                        <div class="p-2 text-center font-medium">Movie 3</div>
                    </div>
                    <div class="rounded-lg overflow-hidden shadow hover:shadow-md">
                        <img src="https://via.placeholder.com/300x200?text=Movie+4" alt="Movie 4" class="w-full">
                        <div class="p-2 text-center font-medium">Movie 4</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
