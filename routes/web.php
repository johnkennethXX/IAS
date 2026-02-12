<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });

// Standard User Dashboard
Route::get('/dashboard', function () { 
    return view('dashboard'); 
})->middleware(['auth'])->name('dashboard');

// ALL Admin Routes (Grouped together)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

// Profile Routes (Standard Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';