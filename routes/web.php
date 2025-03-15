<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('auth.login');
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'userrole:1'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'index']);
    Route::get('superadmin/admin/list', [SuperadminController::class, 'admin_list']);
    Route::get('superadmin/faculty/list', [SuperadminController::class, 'faculty_list']);
    Route::get('superadmin/student/list', [SuperadminController::class, 'student_list']);
});

Route::middleware(['auth', 'userrole:2'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index']);
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
});
Route::middleware(['auth', 'userrole:3'])->group(function () {
    Route::get('/faculty/dashboard', [FacultyController::class, 'index']);
});
Route::middleware(['auth', 'userrole:4'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index']);
});

require __DIR__ . '/auth.php';
