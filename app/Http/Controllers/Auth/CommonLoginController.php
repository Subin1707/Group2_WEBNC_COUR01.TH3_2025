<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'role' => 'required|in:web,customer',
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $guard = $request->role;

        if (Auth::guard($guard)->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->filled('remember'))) {

            return $guard === 'web'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('customer.dashboard');
        }

        return back()->with('error', 'Thông tin đăng nhập không chính xác!');
    }

    public function logout(Request $request)
    {
        $guard = $request->role ?? 'web'; // mặc định web
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
