<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Subject;

class FacultyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Retrieve the faculty associated with the logged-in user
        $faculty = $user->faculty;  // Assuming 'faculty' is the relationship defined in the User model

        // Retrieve all the subjects for this faculty
        $subjects = $faculty->subjects; // This assumes the Faculty model has a 'subjects' relationship

        return view('faculty.dashboard', compact('subjects', 'faculty'));
    }
    public function show_grades(Section $section)
    {
        $section->load('course.department', 'students', 'subjects');

        $faculty = Auth::user()->faculty;

        $subject = $section->subjects()
            ->where('faculty_id', $faculty->id)
            ->firstOrFail();

        $students = $section->students;

        return view('faculty.grade-system', compact('faculty', 'subject', 'section', 'students'));
    }
}
