<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MiniTestController;

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products Page Route
Route::get('/products', [ProductController::class, 'index'])->name('products.list');

Route::get('/mini-test', [MiniTestController::class, 'index'])->name('mini_test');
Route::post('/mini-test/store', [MiniTestController::class, 'store'])->name('mini_test.store');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
