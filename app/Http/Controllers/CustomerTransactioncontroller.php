<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CustomerTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('plant')->where('user_id', Auth::id())->get();
        return view('customer.transactions.index', compact('transactions'));
    }
}
