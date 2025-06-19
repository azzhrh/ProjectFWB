<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customercontroller extends Controller
{
     public function dashboard()
    {
        return view('customer.dashboard');
    }
}
