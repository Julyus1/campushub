<?php

use App\Http\Controllers\ProfileController;
use App\Models\Superadmin;
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

    //admin user management
    Route::get('superadmin/admin/user', [SuperadminController::class, 'admin_user']);
    Route::post('superadmin/admin/create-user/{admin}', [SuperadminController::class, 'admin_store_user']);


    Route::get('superadmin/faculty/user', [SuperadminController::class, 'faculty_user']);
    Route::post('superadmin/faculty/create-user/{faculty}', [SuperadminController::class, 'faculty_store_user']);

    Route::get('superadmin/student/user', [SuperadminController::class, 'student_user']);

    Route::get('superadmin/student/list', [SuperAdminController::class, 'show_stud']);
    Route::get('superadmin/student/profile/{student}', [SuperAdminController::class, 'stud_profile']);
    Route::get('superadmin/student/register', [SuperAdminController::class, 'create_stud']);
    Route::post('superadmin/student/register', [SuperAdminController::class, 'store_stud']);
    Route::get('superadmin/student/update/{student}', [SuperAdminController::class, 'stud_showupdate']);
    Route::patch('superadmin/student/update/{student}', [SuperAdminController::class, 'stud_update']);
    Route::delete('superadmin/student/delete/{student}', [SuperAdminController::class, 'stud_destroy']);

    Route::get('superadmin/course/register', [SuperAdminController::class, 'show_course']);
    Route::post('superadmin/course/add', [SuperAdminController::class, 'store_course']);
    Route::patch('superadmin/course/update/{course}', [SuperAdminController::class, 'update_course']);
    Route::delete('superadmin/course/delete/{course}', [SuperAdminController::class, 'destroy_course']);

    Route::get('superadmin/department/register', [SuperAdminController::class, 'show_department']);
    Route::post('superadmin/department/register', [SuperAdminController::class, 'store_department']);
    Route::patch('superadmin/department/update/{department}', [SuperAdminController::class, 'update_department']);
    Route::delete('superadmin/department/delete/{department}', [SuperAdminController::class, 'destroy_department']);

    Route::get('superadmin/section/list', [SuperAdminController::class, 'show_section']);
    Route::post('superadmin/section/add', [SuperAdminController::class, 'store_section']);
    Route::patch('superadmin/section/update/{section}', [SuperAdminController::class, 'update_section']);
    Route::delete('superadmin/section/delete/{department}', [SuperAdminController::class, 'destroy_section']);

    Route::get('superadmin/admin/register', [SuperadminController::class, 'show_admin']);
    Route::post('superadmin/admin/register', [SuperadminController::class, 'store_admin']);
    Route::patch('superadmin/admin/update/{admin}', [SuperAdminController::class, 'update_admin']);
    Route::delete('superadmin/admin/delete/{admin}', [SuperadminController::class, 'destroy_admin']);

    Route::get('superadmin/faculty/register', [SuperadminController::class, 'show_faculty']);
    Route::post('superadmin/faculty/register', [SuperadminController::class, 'store_faculty']);
    Route::patch('superadmin/faculty/update/{faculty}', [SuperadminController::class, 'update_faculty']);
    Route::delete('superadmin/faculty/delete/{faculty}', [SuperadminController::class, 'destroy_faculty']);

    Route::get('superadmin/subject/list', [SuperAdminController::class, 'show_subject']);
    Route::post('superadmin/subject/register', [SuperadminController::class, 'store_subject']);
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



    // Route::get('section/list', [AdminController::class, 'show_section']);
    // Route::post('section/add', [AdminController::class, 'store_section']);
    // Route::patch('section/update/{section}', [AdminController::class, 'update_section']);
    // Route::delete('section/delete/{department}', [AdminController::class, 'destroy_section']);
});
Route::middleware(['auth', 'userrole:3'])->group(function () {
    Route::get('/faculty/dashboard', [FacultyController::class, 'index']);
});
Route::middleware(['auth', 'userrole:4'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index']);
});

require __DIR__ . '/auth.php';
