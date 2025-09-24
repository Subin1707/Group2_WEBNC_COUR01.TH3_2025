@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Customer Login</h2>

        <!-- Form login -->
        <form method="POST" action="{{ route('customer.login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-600">Remember Me</label>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Login
            </button>

            <!-- Links -->
            <div class="mt-4 text-center">
                <a href="{{ route('customer.password.request') }}" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
            </div>
            <div class="mt-2 text-center">
                <a href="{{ route('customer.register') }}" class="text-sm text-blue-600 hover:underline">Create an account</a>
            </div>
        </form>
    </div>
</div>
@endsection
