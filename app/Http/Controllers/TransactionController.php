<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Plant;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'plant'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::all();
        $plants = Plant::all();
        return view('transactions.create', compact('users', 'plants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plant_id' => 'required|exists:plants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $plant = Plant::findOrFail($request->plant_id);
        $total = $plant->price * $request->quantity;

        Transaction::create([
            'user_id' => $request->user_id,
            'plant_id' => $request->plant_id,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted.');
    }
}
