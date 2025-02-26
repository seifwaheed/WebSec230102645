<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Even & Odd Page
Route::get('/evennum', function () {
    return view('evennum');
})->name('evennum');

// Multiplication Page
Route::get('/multiplication', function () {
    return view('multiplication');
})->name('multiplication');

// Prime Numbers Page
Route::get('/prime', function () {
    return view('prime');
})->name('prime');

// Mini Test Page
Route::get('/minitest', function () {
    $bill = [
        ['item' => 'Apple', 'quantity' => 3, 'price' => 2],
        ['item' => 'Milk', 'quantity' => 1, 'price' => 5],
        ['item' => 'Bread', 'quantity' => 2, 'price' => 3],
    ];
    return view('minitest', ['bill' => $bill]);
})->name('minitest');

// Transcript Page
Route::get('/transcript', function () {
    $student = [
        'name' => 'John Doe',
        'id' => '12345',
    ];
    $courses = [
        ['name' => 'Cybersecurity', 'grade' => 'A'],
        ['name' => 'Network Administration', 'grade' => 'B+'],
        ['name' => 'Web Development', 'grade' => 'A-'],
    ];
    return view('transcript', compact('student', 'courses'));
})->name('transcript');

// Product Routes
Route::get('/products/list', [ProductController::class, 'list'])->name('products_list');
Route::get('/products/add', [ProductController::class, 'add'])->name('products_add');
Route::get('/products/edit/{product?}', [ProductController::class, 'edit'])->name('products_edit');
Route::post('/products/save/{product?}', [ProductController::class, 'save'])->name('products_save');