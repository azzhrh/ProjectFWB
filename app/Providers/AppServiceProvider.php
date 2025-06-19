<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // pastikan ini ada
use App\Http\Middleware\RoleMiddleware; // pastikan ini sesuai dengan lokasi middleware kamu

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Route::middleware('role', RoleMiddleware::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Daftarkan alias middleware di dalam method boot
        Route::aliasMiddleware('role', RoleMiddleware::class);
    }
    
}
