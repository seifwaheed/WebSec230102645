<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts', [PostController::class, 'index'])->name(name: 'posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])->name(name: 'posts.show');