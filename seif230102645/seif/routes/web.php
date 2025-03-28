<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MiniTestController;
use App\Http\Controllers\Web\UsersController;
use App\Http\Controllers\TranscriptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/products', [ProductController::class, 'index'])->name('products.list');

Route::middleware(['auth'])->group(function () {
    Route::get('/mini_test', [MiniTestController::class, 'index'])->name('mini_test');
    Route::post('/mini_test/store', [MiniTestController::class, 'store'])->name('mini_test.store');
    Route::delete('/mini_test/delete/{id}', [MiniTestController::class, 'destroy'])->name('mini_test.delete');
});

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/transcript', [TranscriptController::class, 'index'])->name('transcript');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/update-role/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
});
