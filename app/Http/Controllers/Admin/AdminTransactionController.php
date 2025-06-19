<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Plant;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'plant'])->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::where('role', 'customer')->get();
        $plants = Plant::all();
        return view('admin.transactions.create', compact('users', 'plants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plant_id' => 'required|exists:plants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $plant = Plant::findOrFail($request->plant_id);
        $totalPrice = $plant->price * $request->quantity;

        Transaction::create([
            'user_id' => $request->user_id,
            'plant_id' => $request->plant_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit(Transaction $transaction)
    {
        $users = User::where('role', 'customer')->get();
        $plants = Plant::all();
        return view('admin.transactions.edit', compact('transaction', 'users', 'plants'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plant_id' => 'required|exists:plants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $plant = Plant::findOrFail($request->plant_id);
        $totalPrice = $plant->price * $request->quantity;

        $transaction->update([
            'user_id' => $request->user_id,
            'plant_id' => $request->plant_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
