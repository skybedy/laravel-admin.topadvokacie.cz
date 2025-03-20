<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureVerificationController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/overeni-podpisu', [SignatureVerificationController::class, 'index'])->name('signature_verification.index');
    Route::get('/overeni-podpisu/show/{id}', [SignatureVerificationController::class, 'show'])->name('signature_verification.show');
    Route::get('/overeni-podpisu/create', [SignatureVerificationController::class, 'create'])->name('signature_verification.create');
    Route::post('/overeni-podpisu/store', [SignatureVerificationController::class, 'store'])->name('signature_verification.store');
    Route::get('/overeni-podpisu/edit', [SignatureVerificationController::class, 'edit'])->name('signature_verification.edit');
    Route::patch('/overeni-podpisu/update', [SignatureVerificationController::class, 'update'])->name('signature_verification.update');
    Route::delete('/overeni-podpisu/destroy', [SignatureVerificationController::class, 'destroy'])->name('signature_verification.destroy');

    Route::get('/', function () {
        return view('index');
    })->name('index');
});

require __DIR__.'/auth.php';
