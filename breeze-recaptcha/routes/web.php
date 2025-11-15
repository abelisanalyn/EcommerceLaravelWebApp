<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlidingPuzzleCaptchaController;
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
});

// Sliding Puzzle Captcha Routes
Route::post('/sliding-puzzle/generate', [SlidingPuzzleCaptchaController::class, 'generate'])->name('sliding-puzzle.generate');
Route::post('/sliding-puzzle/verify', [SlidingPuzzleCaptchaController::class, 'verify'])->name('sliding-puzzle.verify');

require __DIR__.'/auth.php';
