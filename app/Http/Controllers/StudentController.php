<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
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

        Student::create([
            'section_id' => request('section_id'),

            'year_level' => request('year_level'),
            'stud_class' => request('studclass'),
            'department' => request('department'),
            'course' => request('course'),
            'email' => request('email'),
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

    public function stud_showupdate(Student $student)
    {
        $sections = Section::all();
        return view('admin.studupdate', ['student' => $student, 'sections' => $sections]);
    }

    public function stud_update(Student $student)
    {
        //validate
        $student->update([
            'section_id' => request('section_id'),
            'stud_id' => request('stud_id'),
            'year_level' => request('year_level'),
            'stud_class' => request('stud_class'),
            'department' => request('department'),
            'course' => request('course'),
            'email' => request('email'),
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

        return redirect(url('student/list'));
    }
    public function stud_destroy(Student $student)
    {
        $student->delete();
        return redirect(url('student/list'));
    }
}
