<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('student/list', [AdminController::class, 'show_stud']);
Route::get('student/profile/{student}', [AdminController::class, 'stud_profile']);
Route::get('student/register', [AdminController::class, 'create_stud']);
Route::post('student/register', [AdminController::class, 'store_stud']);
Route::get('student/update/{student}', [AdminController::class, 'stud_showupdate']);
Route::patch('student/update/{student}', [AdminController::class, 'stud_update']);
Route::delete('student/delete/{student}', [AdminController::class, 'stud_destroy']);

Route::get('course/register', [AdminController::class, 'show_course']);
Route::post('course/add', [AdminController::class, 'store_course']);
Route::patch('course/update/{course}', [AdminController::class, 'update_course']);
Route::delete('course/delete/{course}', [AdminController::class, 'destroy_course']);


Route::get('department/register', [AdminController::class, 'show_department']);
Route::post('department/register', [AdminController::class, 'store_department']);
Route::patch('department/update/{department}', [AdminController::class, 'update_department']);
Route::delete('department/delete/{department}', [AdminController::class, 'destroy_department']);

Route::get('section/list', [SectionController::class, 'show']);
Route::post('section/add', [SectionController::class, 'store']);
Route::patch('section/update/{section}', [SectionController::class, 'update']);
Route::delete('section/delete/{department}', [SectionController::class, 'destroy']);
