<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index']);
Route::get('student-list', [AdminController::class, 'show']);
Route::get('register-student', [AdminController::class, 'create']);
Route::post('student', [AdminController::class, 'store']);
