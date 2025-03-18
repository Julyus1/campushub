<?php

namespace App\Http\Controllers;

use App\AdminsTrait;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faculty;
use App\Models\Section;

class SuperAdminController extends Controller
{
    use AdminsTrait;

    public function viewprefix()
    {
        return 'superadmin.';
    }
    public function index()
    {
        return view('superadmin.dashboard');
    }
    public function admin_list()
    {
        return view('superadmin.admin-user');
    }
    public function faculty_list()
    {
        return view('superadmin.faculty-user');
    }
    public function student_list()
    {
        return view('superadmin.student-user');
    }
    public function show_admin()
    {
        $admins = Admin::all();
        $departments = Admin::all();

        return view('superadmin.adminlist', compact('admins', 'departments'));
    }
    public function show_faculty()
    {
        $sections = Section::all();
        $faculties = Faculty::all();
        return view('superadmin.facultylist', compact('faculties', 'sections'));
    }
}
