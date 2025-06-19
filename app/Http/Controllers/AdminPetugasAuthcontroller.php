<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPetugasAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-petugas.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'petugas') {
                return redirect()->route('petugas.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Customer tidak boleh login di sini.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}

