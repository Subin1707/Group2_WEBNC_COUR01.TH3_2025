<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class CustomerAuthController extends Controller
{
    /** Form đăng ký */
    public function showRegisterForm()
    {
        return view('customer.auth.register'); 
    }

    /** Xử lý đăng ký */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:customers,email',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->intended(route('customer.dashboard'))
                         ->with('success', 'Đăng ký thành công! 🎉');
    }

    /** Form login */
    public function showLoginForm()
    {
        return view('customer.auth.login'); 
    }

    /** Xử lý login */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('customer')->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();
            return redirect()->intended(route('customer.dashboard'))
                             ->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    /** Form quên mật khẩu */
    public function showForgotPasswordForm()
    {
        return view('customer.auth.forgot-password');
    }

    /** Gửi mail reset password */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('customers')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    /** Form reset password */
    public function showResetPasswordForm($token)
    {
        return view('customer.auth.reset-password', ['token' => $token]);
    }

    /** Xử lý reset password */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::broker('customers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($customer, $password) {
                $customer->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                Auth::guard('customer')->login($customer);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('customer.dashboard')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    /** Logout */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('customer.login')->with('success', 'Bạn đã đăng xuất.');
    }
}
