<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class petugascontroller extends Controller
{
     public function dashboard()
    {
        return view('petugas.dashboard');
    }
}
