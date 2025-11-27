<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WirelessPrintingController;
use App\Http\Controllers\LibraryRegistrationController;
use App\Http\Controllers\LibraryAdminController;
use Illuminate\Support\Facades\Route;

// Welcome / Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard (staff view their prints)
Route::get('/admin', [WirelessPrintingController::class, 'landing'])->middleware(['auth', 'verified'])->name('dashboard');

// Library Registration (public)
Route::get('/library/register', [LibraryRegistrationController::class, 'showRegistrationForm'])->name('library.register.form');
Route::post('/library/register', [LibraryRegistrationController::class, 'register'])->name('library.register');

// Library Admin (authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/library/dashboard', [LibraryAdminController::class, 'dashboard'])->name('library.dashboard');
    Route::get('/library/staff/create', [LibraryAdminController::class, 'createStaffForm'])->name('library.staff.create');
    Route::post('/library/staff', [LibraryAdminController::class, 'storeStaff'])->name('library.staff.store');
    Route::get('/library/staff/{id}/edit', [LibraryAdminController::class, 'editStaff'])->name('library.staff.edit');
    Route::patch('/library/staff/{id}', [LibraryAdminController::class, 'updateStaff'])->name('library.staff.update');
    Route::delete('/library/staff/{id}', [LibraryAdminController::class, 'deleteStaff'])->name('library.staff.delete');
});

// Profile Management (authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'editp'])->name('profile.password');
    Route::get('/profile/del', [ProfileController::class, 'editd'])->name('profile.delete');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Subdomain (patron printing - public)
Route::domain('{slug}.'.config('app.domain', 'localhost'))->group(function () {
    Route::get('/', [WirelessPrintingController::class, 'subdomainForm'])->name('subdomain.form');
    Route::post('/store', [WirelessPrintingController::class, 'subdomainStore'])->name('subdomain.store');
});

require __DIR__.'/auth.php';
