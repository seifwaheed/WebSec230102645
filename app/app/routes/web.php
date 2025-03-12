<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test",[TestController::class,"firstAction"]);
Route::get("/tesst",[TestController::class,"gread"]);