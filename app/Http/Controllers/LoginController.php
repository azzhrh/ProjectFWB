<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect()->route('admin.dashboard'),
                'petugas' => redirect()->route('petugas.dashboard'),
                'customer' => redirect()->route('customer.dashboard'),
                default => redirect()->route('login'),
            };
        }

        return redirect('login')->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }
}
