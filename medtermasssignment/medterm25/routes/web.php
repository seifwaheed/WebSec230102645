<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Only Admins can create employees
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () { return view('admin.dashboard'); });
    Route::post('/admin/create-employee', [AdminController::class, 'createEmployee']);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});
Route::middleware(['auth', 'can:manage-customers'])->get('/customers', function () {
    $customers = User::where('role', 'Customer')->get();
    return view('customers.index', compact('customers'));
});

// Only Employees can manage products & customers
Route::middleware(['auth', 'role:Employee'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::post('/customers/add-credit', [EmployeeController::class, 'addCredit']);
});

// Customers can browse & buy products
Route::middleware(['auth', 'role:Customer'])->group(function () {
    Route::get('/store', [ProductController::class, 'index']);
    Route::post('/buy/{product}', [OrderController::class, 'buy']);
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy')->middleware('auth');


Route::get('/purchased', function () {
    return view('products.purchased');
})->middleware('auth')->name('products.purchased');
