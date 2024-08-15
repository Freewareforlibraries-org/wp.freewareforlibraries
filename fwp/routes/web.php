<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WirelessPrintingController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [WirelessPrintingController::class, 'landing'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WirelessPrintingController::class, 'index'])->name('user.index');
Route::post('/store', [WirelessPrintingController::class, 'store'])->name('store');
Route::delete('/adminf/wp/{wp}/delete', [WirelessPrintingController::class, 'delete'])->name('wp.delete');
Route::get('/storage/prints/{id}/check', [WirelessPrintingController::class, 'getFile'])->where('filename', '^[^/]+$')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
