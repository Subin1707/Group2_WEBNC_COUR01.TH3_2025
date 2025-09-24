@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Reset Password</h2>

        <!-- Form reset password -->
        <form method="POST" action="{{ route('customer.password.update') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $email ?? '') }}" required autofocus
                       class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                Reset Password
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('customer.login') }}" class="text-sm text-blue-600 hover:underline">Back to Login</a>
        </div>
    </div>
</div>
@endsection
