<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard');
    }
}
