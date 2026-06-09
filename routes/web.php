<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ServiceController;

// Halaman Landing Page
Route::get('/', [FrontEndController::class, 'index'])->name('home');

// Halaman Admin (Dilindungi oleh middleware 'auth')
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Pengaturan Profil Perusahaan
    Route::get('/company-profile', [CompanyProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/company-profile', [CompanyProfileController::class, 'update'])->name('profile.update');

    // CRUD Layanan
    Route::resource('services', ServiceController::class);
});

// Route bawaan Breeze untuk Login, Register, dll
require __DIR__.'/auth.php';