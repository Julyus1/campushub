<?php

namespace App\Http\Controllers;

use App\Models\AcadHistory;
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

    public function grade_display(AcadHistory $history) // RENAMED function, SIGNATURE requires $history
    {
        // --- Authorization Check ---
        if (!Auth::user()->student || $history->student_id !== Auth::user()->student->id) {
            abort(403, 'Unauthorized Access');
        }

        // --- Eager Load Data ---
        $history->load([
            'grades' => function ($query) {
                $query->with('subject'); // Load subject details for each grade
            },
            'section.course' // Load section and course details
        ]);

        $student = Auth::user()->student;

        // --- Pass Data to the View ---
        // Return YOUR specified view ('student.computed-grade')
        return view('student.computed-grade', compact('history', 'student'));
    }

    public function grade_list()
    {
        // Get the authenticated user's student record
        // Ensure the user actually has a student profile associated
        if (!Auth::user()->student) {
            // Handle appropriately - redirect, show error, etc.
            return redirect('/home')->with('error', 'Student profile not found.');
        }
        $student = Auth::user()->student;

        // Fetch the Academic Histories FOR THIS student using the relationship method.
        // Eager load the 'section' relationship.
        // Order by ID (descending = newest first, ascending = oldest first)
        $acadHistories = $student->acadHistories() // Access the relationship METHOD
            ->with('section')    // Eager load the section data
            ->orderBy('id', 'desc') // Order by ID, newest first
            ->get();             // Execute the query

        // Pass the student object AND the collection of acadHistories to the view
        return view('student.grade-system', compact('student', 'acadHistories'));
    }
}
