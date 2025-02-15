<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index']);
Route::get('student-list', [AdminController::class, 'show_stud']);
Route::get('register-student', [AdminController::class, 'create_stud']);
Route::post('student', [AdminController::class, 'store_stud']);
Route::get('register-course', [AdminController::class, 'show_course']);
Route::get('register-department', [AdminController::class, 'show_department']);
Route::post('department', [AdminController::class, 'store_department']);
