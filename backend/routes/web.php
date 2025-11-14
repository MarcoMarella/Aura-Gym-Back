<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

// Redirect root to admin login
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (public)
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', AdminProductController::class);
        Route::resource('orders', AdminOrderController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    });
});
