<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\Department;
use App\Models\Course;


class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.index');
    }

    public function show_stud()
    {
        $students = Student::latest()->get();
        return view('admin.studlist', ['students' => $students]);
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
        return redirect('student/register');
    }

    public function stud_profile(Student $student)
    {
        return view('admin.studdetail', ['student' => $student]);
    }
    public function show_course()
    {
        $courses = Course::all();
        $departments = Department::all();
        return view('admin.coursereg', compact('courses', 'departments'));
    }

    public function store_course()
    {
        Course::create([
            'department_id' => request('department_id'),
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect('course/register');
    }
    public function show_department()
    {
        $departments = Department::all();

        return view('admin.department', compact('departments'));
    }

    public function store_department()
    {
        //fking validate
        Department::create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return  redirect('department/register');
    }

    public function update_department()
    {
        dd("tanginang");
    }
}
