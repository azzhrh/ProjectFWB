<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AdminPetugasAuthController; 
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CustomerCatalogController;
use App\Http\Controllers\CustomerTransactionController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPlantController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Customer\CategoryController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Petugas\PetugasDashboardController;
use App\Http\Controllers\Petugas\PetugasPlantController;
use App\Http\Controllers\Customer\CatalogController;

// ====================
// HALAMAN AWAL / BERANDA
// ====================
Route::get('/', function () {
    return view('welcome');
});

// ====================
// DASHBOARD UMUM (optional, bisa dihapus kalau pakai per role saja)
// ====================
Route::get('/dashboard', [BerandaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ====================
// AUTH (UMUM / SHARED UNTUK SEMUA ROLE)
// ====================
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ====================
// AUTH KHUSUS CUSTOMER
// ====================
Route::get('/customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register']);
Route::get('/customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login']);

// ====================
// AUTH KHUSUS ADMIN & PETUGAS
// ====================
Route::get('/admin-petugas/login', [AdminPetugasAuthController::class, 'showLoginForm'])->name('admin-petugas.login');
Route::post('/admin-petugas/login', [AdminPetugasAuthController::class, 'login']);

// ====================
// PROFIL - UNTUK SEMUA YANG LOGIN
// ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfilController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfilController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfilController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfilController::class, 'destroy'])->name('profile.destroy');
});

// ====================
// DASHBOARD BERDASARKAN ROLE
// ====================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':petugas'])->group(function () {
    Route::get('/petugas/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':customer'])->group(function () {
    Route::get('/customer/dashboard', [UserDashboardController::class, 'dashboard'])->name('customer.dashboard');
});

// ====================
// ADMIN - CRUD & TRANSAKSI
// ====================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/plants', AdminPlantController::class);
        Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('transactions');
    });

// ====================
// CUSTOMER - KATALOG, BELI, TRANSAKSI
// ====================
Route::middleware(['auth', RoleMiddleware::class . ':customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/catalog', [CustomerCatalogController::class, 'index'])->name('catalog');
        Route::post('/catalog/buy/{plant}', [CustomerCatalogController::class, 'buy'])->name('catalog.buy');
        Route::get('/transactions', [CustomerTransactionController::class, 'index'])->name('transactions');

        // ✅ FIXED DI SINI: route yang benar dan tidak tumpang tindih
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    });

// ====================
// PETUGAS - DASHBOARD (VIEW KHUSUS)
// ====================
Route::middleware(['auth', RoleMiddleware::class . ':petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {
        Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    });

// ====================
// (Optional) CATEGORY CRUD untuk umum / testing
// ====================
Route::resource('categories', AdminCategoryController::class)->middleware('auth');

// ====================
// JANGAN DIUBAH: Route testing manual (tetap dipertahankan sesuai permintaan)
// ====================
Route::get('/plants', [AdminPlantController::class, 'index'])->name('plants.index');

Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::resource('plants', PetugasPlantController::class);
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('/plants', AdminPlantController::class); // ← HARUS ADA INI
        Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
    });

// ====================
// (Optional) Kategori berdasarkan tanaman
// ====================
Route::get('/customer/categories/{category}', [CatalogController::class, 'byCategory'])
    ->name('customer.catalog.byCategory');
