<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureVerificationController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/overeni-podpisu', [SignatureVerificationController::class, 'index'])->name('signature_verification.index');

    Route::get('/', function () {
        return view('index');
    })->name('index');
});

require __DIR__.'/auth.php';
