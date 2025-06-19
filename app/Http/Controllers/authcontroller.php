<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authcontroller extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function submitregister(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
    public function submitlogin(Request $request){
        $user = $request->only('email', 'password');

        if(Auth::attempt($user)){

            $role = Auth::user()->role;
            if($role== "admin"){
                return redirect()->route('admin');
            }else if($role == 'petugas'){
                return redirect()->route('petugas');
            }else{
                return redirect()->route('customer');
            }
            
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function admin(){
        return view('halaman-depan.admin');
    }
    public function petugas(){
        return view('halaman-depan.petugas');
    }
    public function customer(){
        return view('halaman-depan.customer');
    }
}
