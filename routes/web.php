<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkincareCategoryController;
use App\Http\Controllers\SkincareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/test', [DashboardController::class, 'test']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // CATEGORY SKINCARE
    Route::resource('/skincare-category', SkincareCategoryController::class);
    // SKINCARE
    Route::resource('/skincare', SkincareController::class);
});

require __DIR__.'/auth.php';