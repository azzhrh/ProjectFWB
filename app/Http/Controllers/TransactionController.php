<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Plant;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->plant_id = $request->plant_id;
            $transaction->quantity = $request->quantity;
            $transaction->save();

            $plant = Plant::find($request->plant_id);
            $plant->stock -= $request->quantity;

            if ($plant->stock < 0) {
                throw new \Exception("Stok tidak cukup.");
            }

            $plant->save();
        });

        return redirect()->back()->with('success', 'Transaksi berhasil.');
    }
}
