<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\InterestController;
use App\Http\Controllers\User\PersonalizationController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/interest', [InterestController::class, 'index'])->name('interest');
    Route::get('/personalization', [PersonalizationController::class, 'index'])->name('personalization.index');
    Route::post('/interests', [InterestController::class, 'storePersonalization'])->name('interests.personalize');
    Route::get('/personalization/{personalization}/edit', [PersonalizationController::class, 'editPersonalization'])->name('personalization.edit');
    Route::put('/personalization/{personalization}', [PersonalizationController::class, 'updatePersonalization'])->name('personalization.update');
    Route::delete('/personalization/{personalization}', [PersonalizationController::class, 'destroyPersonalization'])->name('personalization.destroy');
});

require __DIR__.'/auth.php';
