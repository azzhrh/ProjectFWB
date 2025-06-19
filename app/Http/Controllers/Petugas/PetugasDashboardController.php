<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        $plants = Plant::with('category')->get();
        return view('petugas.dashboard', compact('plants'));
    }
}
