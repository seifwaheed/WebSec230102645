<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/evennum', function () {
    return view('evennum');
});
Route::get('/prime', function () {
    return view('prime');
});
Route::get('/gadwaleldarb', function () {
    return view('gadwaleldarb');
});