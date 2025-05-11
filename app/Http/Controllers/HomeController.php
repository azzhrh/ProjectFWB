<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plant;
use App\Models\Category;
use App\Models\Transaction;
use App\Http\Middleware\RoleMiddleware; // ⬅️ Tambahkan ini

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Wajib login
        $this->middleware(RoleMiddleware::class . ':admin'); // ⬅️ Gunakan langsung middleware class-nya
    }

    public function index()
    {
        $totalUsers = User::count();
        $totalPlants = Plant::count();
        $totalCategories = Category::count();
        $totalTransactions = Transaction::count();

        return view('home', compact(
            'totalUsers',
            'totalPlants',
            'totalCategories',
            'totalTransactions'
        ));
    }
}
