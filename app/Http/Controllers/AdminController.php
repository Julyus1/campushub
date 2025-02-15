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

    public function show()
    {
        return view('admin.studlist');
    }
    public function create()
    {
        return view('admin.studentreg');
    }

    public function store()
    {
        dd('store some values');
    }
}
