<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\AdminsTrait;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    use AdminsTrait;

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

        return redirect()->back()->with('sucess', 'Admin entity successfully created!');
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
        return redirect()->back()->with('sucess', 'Admin entity successfully created!');
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

    public function faculty_user()
    {
        return view('superadmin.faculty-user');
    }
    public function student_user()
    {
        return view('superadmin.student-user');
    }

    public function show_faculty()
    {
        $sections = Section::all();
        $faculties = Faculty::all();
        return view('superadmin.facultylist', compact('faculties', 'sections'));
    }
}
