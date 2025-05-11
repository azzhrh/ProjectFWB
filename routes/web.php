<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));
});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas/dashboard', fn() => view('petugas.dashboard'));
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', fn() => view('user.dashboard'));
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'));
    Route::get('/admin/settings', fn() => view('admin.settings'));
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 