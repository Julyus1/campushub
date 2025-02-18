<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('student/list', [AdminController::class, 'show_stud']);
Route::get('student/profile/{student}', [AdminController::class, 'stud_profile']);
Route::get('student/register', [AdminController::class, 'create_stud']);
Route::post('student/register', [AdminController::class, 'store_stud']);
Route::get('course/register', [AdminController::class, 'show_course']);

Route::post('course/register', [AdminController::class, 'store_course']);

Route::get('student/update/{student}', [AdminController::class, 'stud_showupdate']);
Route::patch('student/update/{student}', [AdminController::class, 'stud_update']);
Route::delete('student/delete/{student}', [AdminController::class, 'stud_destroy']);
Route::get('department/register', [AdminController::class, 'show_department']);
Route::post('department/register', [AdminController::class, 'store_department']);
Route::patch('register-department', [AdminController::class, 'store_department']);
