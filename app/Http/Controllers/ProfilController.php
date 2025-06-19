<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profil.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only('name', 'email'));
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/')->with('success', 'Akun telah dihapus.');
    }
}
