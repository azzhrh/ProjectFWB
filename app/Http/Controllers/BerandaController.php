<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $var_nama = "Azzahra";
        return view('HalamanDepan.dashboard', compact('var_nama'));
    }

    public function create()
    {
        return view('HalamanDepan.create');
    }
}
