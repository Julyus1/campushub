<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        return view('faculty.dashboard');
    }
    public function show_grades()
{
    return view('faculty.grade-system'); 
}

}
