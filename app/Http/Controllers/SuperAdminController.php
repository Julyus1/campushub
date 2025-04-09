<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\AdminsTrait;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Section;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    use AdminsTrait;
    public function attach_subject()

    {
        $departments = Department::all();
        return view('superadmin.subject-attachment', compact('departments'));
    }
    public function show_grades()
    {
        return view('superadmin.grade-system');
    }
    public function viewprefix()
    {
        return 'superadmin.';
    }
    public function redirectprefix()
    {
        return 'superadmin/';
    }
    public function index()
    {
        return view('superadmin.dashboard');
    }

    public function admin_user()
    {
        $unregisteredAdmins = Admin::where('isregistered', false)->get();
        return view('superadmin.admin-user', compact('unregisteredAdmins'));
    }
    public function admin_store_user(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'admin_id' => 'required|exists:admins,id' // Ensure admin_id exists in the admins table
        ]);



        // Create the user with hashed password
        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 2, // Assuming role_id 2 is for admin
            'role_data_id' => $validated['admin_id'], // Bind admin_id to role_data_id
        ]);

        Admin::where('id', $validated['admin_id'])->update(['isregistered' => true]);

        return redirect()->back()->with('success', 'Admin account created successfully!');
    }

    public function faculty_user()
    {
        $unregisteredFaculty = Faculty::where('isregistered', false)->get();
        return view('superadmin.faculty-user', compact('unregisteredFaculty'));
    }

    public function faculty_store_user(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'faculty_id' => 'required|exists:faculties,id' // Ensure admin_id exists in the admins table
        ]);



        // Create the user with hashed password
        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 3, // Assuming role_id 2 is for admin
            'role_data_id' => $validated['faculty_id'], // Bind faculty_id to role_data_id
        ]);

        Faculty::where('id', $validated['faculty_id'])->update(['isregistered' => true]);

        return redirect()->back()->with('success', 'Faculty account created successfully!');
    }
    public function student_user()
    {
        $unregisteredStudent = Student::where('isregistered', false)->get();
        return view('superadmin.student-user', compact('unregisteredStudent'));
    }

    public function student_store_user(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'student_id' => 'required|exists:students,id'
        ]);



        // Create the user with hashed password
        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => 4,
            'role_data_id' => $validated['student_id'],
        ]);

        Student::where('id', $validated['student_id'])->update(['isregistered' => true]);

        return redirect()->back()->with('success', 'User account created successfully!');
    }

    public function stud_destroy($id)
    {
        $student = Student::findOrFail($id);
        if ($student->user) {
            $student->user->delete();
        }
        $student->delete();

        return redirect(url('superadmin/student/list'));
    }


    public function show_admin()
    {
        $admins = Admin::all();
        $departments = Department::all();

        return view('superadmin.adminlist', compact('admins', 'departments'));
    }
    public function store_admin(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'dept_id' => 'required|integer'
        ]);

        Admin::create($validated);

        return redirect()->back()->with('success', 'Admin entity successfully created!');
    }

    public function update_admin(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'dept_id' => 'required|integer'
        ]);
        $admin = Admin::findOrFail($id);
        $admin->update($validated);
        return redirect()->back()->with('success', 'Admin entity successfully created!');
    }

    public function destroy_admin($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->user) {
            $admin->user->delete();
        }
        $admin->delete();

        return redirect()->back()->with('success', 'admin deleted successfully!');
    }



    public function show_faculty()
    {

        $faculties = Faculty::all();
        return view('superadmin.facultylist', compact('faculties'));
    }
    public function store_faculty(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'string|required',
            'middle_name' => 'nullable|string',
            'last_name' => 'string|required'
        ]);

        Faculty::create($validated);

        return redirect()->back()->with('success', 'Faculty entity successfully created!');
    }
    public function update_faculty(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'string|required',
            'middle_name' => 'nullable|string',
            'last_name' => 'string|required'

        ]);
        $faculty = Faculty::find($id);

        $faculty->update($validated);
        return redirect()->back()->with('success', 'Faculty entity successfully updated!');
    }
    public function destroy_faculty($id)
    {
        $faculty = Faculty::findOrFail($id);
        if ($faculty->user) {
            $faculty->user->delete();
        }
        $faculty->delete();
        return redirect()->back()->with('success', 'Faculty entity successfully deleted!');
    }

    public function show_subject()
    {
        $subjects = Subject::all();
        $faculties = Faculty::all();
        $sections = Section::all();
        return view('superadmin.subject', compact('subjects', 'faculties', 'sections'));
    }
    public function store_subject(Request $request)
    {

        $validated = $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'faculty_id' => 'nullable|integer|exists:faculties,id'
        ]);


        Subject::create($validated);

        return redirect()->back()->with('success', 'Subject entity successfully created!');
    }

    public function update_subject(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'faculty_id' => 'nullable|integer|exists:faculties,id'
        ]);

        $subject = Subject::findOrFail($id);

        $subject->update($validated);

        return redirect()->back()->with('success', 'Subject entity successfully updated!');
    }

    public function destroy_subject($id)
    {

        $subject = Subject::findOrFail($id);

        $subject->delete();

        return redirect()->back()->with('success', 'Subject entity successfully deleted!');
    }

    public function show_sectionsub($id)
    {
        $section = Section::with('subjects')->findOrFail($id);
        $allSections = Section::all();
        $subjects = Subject::all();

        return view('superadmin.section-sublist', compact('section', 'subjects'));
    }

    public function attach_subject_to_section(Request $request)
    {
        // 1. Validate the incoming request data
        $validated = $request->validate([
            // Ensure section_id is present and exists in the 'sections' table
            'section_id' => ['required', 'integer', 'exists:sections,id'],
            // Ensure subject_id is present and exists in the 'subjects' table
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
        ]);

        // 2. Find the specific section
        // Using findOrFail will automatically throw a 404 error if the section isn't found
        $section = Section::findOrFail($validated['section_id']);

        // 3. Check if the subject is already attached to this section
        // This prevents duplicate entries in the pivot table
        $isAttached = $section->subjects()->where('subject_id', $validated['subject_id'])->exists();

        if ($isAttached) {
            // If already attached, redirect back with an informational message
            return redirect()->back()
                ->with('info', 'This subject is already assigned to the section.');
            // Optionally use ->withInput() to repopulate the form if needed,
            // but it might not be necessary for a simple select dropdown.
        }

        // 4. Attach the subject to the section
        // The attach() method handles adding the record to the pivot table
        // It accepts the ID of the related model (Subject in this case)
        try {
            $section->subjects()->attach($validated['subject_id']);

            // 5. Redirect back to the previous page (section's subject list) with a success message
            return redirect()->back()
                ->with('success', 'Subject added successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error attaching subject to section: ' . $e->getMessage());

            // Redirect back with a generic error message
            return redirect()->back()
                ->with('error', 'An error occurred while adding the subject. Please try again.');
        }
    }
}
