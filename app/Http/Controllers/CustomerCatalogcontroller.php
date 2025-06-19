<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCatalogController extends Controller
{
    public function index()
    {
        $plants = Plant::with('category')->get();
        return view('customer.catalog.index', compact('plants'));
    }

    public function buy(Plant $plant)
    {
        Transaction::create([
            'user_id' => Auth::id(),
            'plant_id' => $plant->id,
            'quantity' => 1,
            'total_price' => $plant->price,
        ]);

        return redirect()->route('customer.transactions')->with('success', 'Berhasil membeli tanaman.');
    }
}

