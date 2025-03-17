<?php

namespace App\Http\Controllers;

use App\AdminsTrait;
use Illuminate\Http\Request;

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
}
