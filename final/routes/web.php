<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MiniTestController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\QuestionController;

Route::get('/minitest', [MiniTestController::class, 'index']);
Route::get('/transcript', [TranscriptController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/calculator', [CalculatorController::class, 'index']);
Route::get('/gpa-simulator', [CalculatorController::class, 'gpaSimulator']);


// Users CRUD
Route::resource('users', UserController::class);

// Grades CRUD
Route::resource('grades', GradeController::class);

// MCQ Exam
Route::resource('questions', QuestionController::class);