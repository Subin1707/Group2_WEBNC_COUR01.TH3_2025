<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Hiển thị form login chung cho admin & customer.
     */
    public function create(): View
    {
        return view('auth.login'); // 👈 form dùng chung
    }

    /**
     * Xử lý login.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Admin login (guard web)
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                ->with('success', 'Chào mừng Admin!');
        }

        // Customer login (guard customer)
        if (Auth::guard('customer')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard')
                ->with('success', 'Đăng nhập thành công!');
        }

        // Sai thông tin
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    /**
     * Logout admin hoặc customer.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } elseif (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // 👈 quay về form login chung
    }
}
