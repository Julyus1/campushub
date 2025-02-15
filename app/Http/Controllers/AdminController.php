<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function show_stud()
    {
        return view('admin.studlist');
    }
    public function create_stud()
    {
        return view('admin.studentreg');
    }

    public function store_stud()
    {
        dd('hello');
    }
    public function show_course()
    {
        return view('admin.coursereg');
    }
    public function show_department()
    {
        return view('admin.department');
    }
}
