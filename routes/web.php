<?php

use App\Http\Controllers\UrlShortenerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::post('logout', LogoutController::class)->name('logout')->middleware('auth');

// URL Shortener Routes
Route::get('/', [UrlShortenerController::class, 'index'])->name('urls.index');
Route::get('/reports', [UrlShortenerController::class, 'reports'])->name('urls.reports');
Route::get('/create', [UrlShortenerController::class, 'create'])->name('urls.create');
Route::post('/store', [UrlShortenerController::class, 'store'])->name('urls.store');
Route::get('/{shortCode}', [UrlShortenerController::class, 'redirect'])->name('urls.redirect');
