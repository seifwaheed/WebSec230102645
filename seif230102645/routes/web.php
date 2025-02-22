<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/evennum', function () {
    return view('evennum');
})->name('evennum');

Route::get('/multiplication', function () {
    return view('multiplication');
})->name('multiplication');

Route::get('/prime', function () {
    return view('prime');
})->name('prime');