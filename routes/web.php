<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
});

require __DIR__.'/auth.php';
