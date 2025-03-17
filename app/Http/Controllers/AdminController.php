<?php

namespace App\Http\Controllers;

use App\AdminsTrait;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    use AdminsTrait;
    //

    public function index()
    {
        return view('admin.index');
    }
}
