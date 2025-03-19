<?php

namespace App;

use App\Models\Student;
use App\Models\Section;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

trait AdminsTrait
{
    // to fix immediately the routing of these is specific
    //studlist, coure register 
    public function viewprefix()
    {
        return 'admin.';
    }
    public function redirectprefix()
    {
        return 'admin/';
    }
    public function show_stud()
    {
        $students = Student::latest()->get();
        return view($this->viewprefix() . 'studlist', ['students' => $students]);
    }
    public function create_stud()
    {
        $sections = Section::all();

        return view($this->viewprefix() . 'studentreg', compact('sections'));
    }

    public function store_stud()
    {

        Student::create([
            'section_id' => request('section_id'),

            'year_level' => request('year_level'),

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
        return redirect($this->redirectprefix() . 'student/register');
    }

    public function stud_profile(Student $student)
    {
        return view($this->viewprefix() . 'studdetail', ['student' => $student]);
    }

    public function stud_showupdate(Student $student)
    {
        $sections = Section::all();
        return view($this->viewprefix() . 'studupdate', ['student' => $student, 'sections' => $sections]);
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

        return redirect(url($this->redirectprefix() . 'student/list'));
    }
    public function stud_destroy(Student $student)
    {
        $student->delete();
        return redirect(url($this->redirectprefix() . 'student/list'));
    }

    public function show_course()
    {
        $courses = Course::with('department')->get();
        $departments = Department::all();

        //validate

        return view($this->viewprefix() . 'coursereg', compact('courses', 'departments'));
    }

    public function store_course()
    {
        Course::create([
            'department_id' => request('department_id'),
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect($this->redirectprefix() . 'course/register');
    }

    public function update_course(Request $request, Course $course)
    {

        // Validate input before updating
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id', // Ensure the department exists
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);


        $course->update($validated);


        return redirect(url($this->redirectprefix() . 'course/register'));
    }

    public function destroy_course(Course $course)
    {
        $course->delete();
        return redirect(url($this->redirectprefix() . 'course/register'));
    }

    public function show_department()
    {
        $departments = Department::all();

        return view($this->viewprefix() . 'department', compact('departments'));
    }

    public function store_department()
    {
        //fking validate
        Department::create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return  redirect($this->redirectprefix() . 'department/register');
    }

    public function update_department(Request $request, Department $department)
    {
        // Validate input
        $validated =  $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);




        $department->update($validated);


        return redirect(url($this->redirectprefix() . 'department/register'));
    }

    public function destroy_department(Department $department)
    {
        $department->delete();
        return redirect(url($this->redirectprefix() . 'department/register'));
    }


    public function show_section()
    {
        $sections = Section::with('course')->get();
        $courses = Course::all();
        return view($this->viewprefix() . 'section', compact('sections', 'courses'));
    }

    public function store_section(Request $request)
    {

        $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'section' => 'required|string|max:255|unique:sections,title'
        ], [
            'course_id.required' => 'The course field is required.',
            'course_id.exists' => 'The selected course does not exist.',
            'section.required' => 'The section field is required.',
            'section.unique' => 'This section already exists.',
        ]);

        Section::create([
            'course_id' => $request->course_id, // Ensure this field is mapped correctly
            'title' => $request->section
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Section added successfully!');
    }

    public function update_section(Request $request, $id)
    {
        $request->validate([
            'coursename' => 'required|exists:courses,id',
            'section' => 'required|string|max:255|unique:sections,title,' . $id
        ]);

        $section = Section::findOrFail($id);
        $section->update([
            'course_id' => $request->coursename,
            'title' => $request->section
        ]);

        return redirect()->back()->with('success', 'Section updated successfully!');
    }

    public function destroy_section($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully!');
    }
}
