<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;


class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function show_stud()
    {
        $students = Student::all();
        return view('admin.studlist', compact('students'));
    }
    public function create_stud()
    {
        $sections = Section::all();

        return view('admin.studentreg', compact('sections'));
    }

    public function store_stud()
    {
        //fucking validate
        Student::create([
            'section_id' => request('section_id'),
            'stud_id' => request('stud_id'),
            'year_level' => request('year_level'),
            'stud_class' => request('studclass'),
            'department' => request('department'),
            'course' => request('course'),
            'firstname' => request('firstname'),
            'middlename' => request('middlename'),
            'lastname' => request('lastname'),
            'gender' => request('gender'),
            'birthdate' => request('dob'),
            'contact' => request('contact'),
            'religion' => request('religion'),
            'origin' => request('origin'),
            'nationality' => request('nationality'),
            'civilstatus' => request('civilstatus'),
            'birthplace' => request('birthplace'),
            'stname' => request('stname'),
            'brgy' => request('brgy'),
            'city' => request('city'),
            'province' => request('province'),
            'postalcode' => request('postalcode'),
            'homenumber' => request('homenumber'),
            'mobilenumber' => request('mobilenumber'),
            'emergencyperson' => request('emergencyperson'),
            'relationship' => request('relationship'),
            'emergencycontact' => request('emergencycontact'),

        ]);
        return redirect('register-student');
    }
    public function show_course()
    {
        return view('admin.coursereg');
    }
    public function show_department()
    {
        return view('admin.department');
    }

    public function store_department()
    {
        dd("tanginang");
    }
}
