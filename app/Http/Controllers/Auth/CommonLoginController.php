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
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required|in:admin,customer',
        ]);

        $guard = $request->type === 'admin' ? 'web' : 'customer';

        if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
            return redirect()->intended($guard === 'web' ? route('admin.dashboard') : route('customer.dashboard'));
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
