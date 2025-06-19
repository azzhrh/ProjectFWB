<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.customer.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        Auth::login($user);
        return redirect()->route('customer.dashboard');
    }

    public function showLoginForm()
    {
        return view('auth.customer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'customer') {
                return redirect()->route('customer.dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Hanya customer yang bisa login di sini.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}
