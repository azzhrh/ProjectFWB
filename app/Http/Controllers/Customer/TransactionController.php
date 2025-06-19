<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with('plant')
        ->where('user_id', Auth::id())
        ->get();

    return view('customer.transactions.index', compact('transactions'));
}
}
