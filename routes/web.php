<?php

use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\SignatureVerificationController;
use App\Http\Controllers\Api\CustomerAutocompleteController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/overeni-podpisu/home', [SignatureVerificationController::class, 'home'])->name('signature_verification.home');
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

    //furt nevim, nechat to jako api, nebo to dat jako ajax..
    Route::get('/api/autocomplete-customer', [CustomerAutocompleteController::class, 'search']);



});

require __DIR__.'/auth.php';

