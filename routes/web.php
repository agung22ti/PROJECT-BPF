<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/request', function () {
    return Inertia::render('Request');
})->name('request');
Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

// Admin
Route::get('/Admin/Pengajuan', function () {
    return Inertia::render('Admin/Pengajuan');
});
Route::get('/Admin/Dashboard', function () {
    return Inertia::render('Admin/Dashboard');
});
Route::get('/Admin/Request', function () {
    return Inertia::render('Admin/Request');
});

// Donatur
Route::get('/Donatur/Dashboard', function () {
    return Inertia::render('Donatur/Dashboard');
});
Route::get('/Donatur/Contact', function () {
    return Inertia::render('Donatur/Contact');
});
Route::get('/Donatur/History', function () {
    return Inertia::render('Donatur/History');
});
Route::get('/Donatur/Request', function () {
    return Inertia::render('Donatur/Request');
});
Route::get('/Donatur/DetailRequest', function () {
    return Inertia::render('Donatur/DetailRequest');
});
Route::get('/Donatur/Donasi', function () {
    return Inertia::render('Donatur/Donasi');
});

// Mahasiswa
Route::get('/Mahasiswa/Dashboard', function () {
    return Inertia::render('Mahasiswa/Dashboard');
});
Route::get('/Mahasiswa/Contact', function () {
    return Inertia::render('Mahasiswa/Contact');
});
Route::get('/Mahasiswa/History', function () {
    return Inertia::render('Mahasiswa/History');
});
Route::get('/Mahasiswa/Request', function () {
    return Inertia::render('Mahasiswa/Request');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
