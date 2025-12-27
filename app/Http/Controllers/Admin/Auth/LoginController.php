<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required|string',
        ], [
            'phone.required' => 'رقم الهاتف مطلوب.',
            'password.required' => 'كلمة المرور مطلوبة.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = [
            'phone' => $request->phone,
            'password' => $request->password,
            'is_active' => true,
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // تحديث last_login_at
            Auth::guard('admin')->user()->update(['last_login_at' => now()]);

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'بيانات الدخول غير صحيحة أو الحساب غير مفعل.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}