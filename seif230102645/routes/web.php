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

Route::get('/minitest', function () {
    $bill = [
        ['item' => 'Apple', 'quantity' => 3, 'price' => 2],
        ['item' => 'Milk', 'quantity' => 1, 'price' => 5],
        ['item' => 'Bread', 'quantity' => 2, 'price' => 3],
    ];

    return view('minitest', ['bill' => $bill]);
});