<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        return view('student.dashboard', compact('student'));
    }

    public function profile()
    {
        $student = Auth::user()->student;

        return view('student.studdetail', compact('student'));
    }

    public function grade_display()
    {
        $student = Auth::user()->student;

        return view('student.computed-grade', compact('student'));
    }

    public function grade_list()
    {

        $student = Auth::user()->student;
        $acad =  $student->load('acadHistories.section');

        return view('student.grade-system', compact('student', 'acad'));
    }
}
