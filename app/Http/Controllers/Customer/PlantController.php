<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Plant;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view('customer.plants.index', compact('plants'));
    }
}

