<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts', [PostController::class, 'index'])->name(name: 'posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name(name: 'posts.create');

Route::post('/posts', [PostController::class , 'store'])->name(name: 'posts.store');


Route::get('/posts/{post}', [PostController::class, 'show'])->name(name: 'posts.show');

