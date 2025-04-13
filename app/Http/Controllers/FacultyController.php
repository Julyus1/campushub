<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Validation\Rule;
use App\Models\Grade;


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
    public function show_grades(Section $section, Subject $subject)
    {
        // Load necessary relationships for the section
        $section->load('course.department', 'subjects'); // Load subjects relationship for validation if needed

        // Get the currently authenticated faculty member
        $faculty = Auth::user()->faculty;

        // --- Validation (Important!) ---
        // 1. Check if the logged-in faculty actually teaches the specific subject passed in the URL
        if ($subject->faculty_id !== $faculty->id) {
            abort(403, 'You are not authorized to grade this subject.');
        }

        if (!$section->subjects->contains($subject)) {
            abort(404, 'This subject is not offered in the specified section.');
        }
        // --- End Validation ---


        // Fetch ALL subjects for the faculty (likely for sidebar/navigation - keep if needed)
        $allFacultySubjects = $faculty->subjects()->with('sections')->get(); // Renamed for clarity


        // Fetch Academic Histories (students) specifically for THIS section.
        // Eager load the student data for efficiency.
        $acadHistories = $section->acadHistories()
            ->with('student')
            // ->where('academic_year_id', $current_ay) // Optional: Add AY/Semester filters if needed
            // ->where('semester', $current_sem)
            ->get();


        $acadHistoryIds = $acadHistories->pluck('id'); // Get the IDs of the relevant history records

        $grades = Grade::whereIn('acad_history_id', $acadHistoryIds) // Only grades for students in this section
            ->where('subject_id', $subject->id) // <<<< USES THE CORRECT SUBJECT passed to the function
            ->where('faculty_id', $faculty->id)    // Grades assigned by this faculty
            ->get()
            ->keyBy('acad_history_id'); // Key by history ID for easy lookup in the view

        return view('faculty.grade-system', compact(
            'faculty',
            'subject', // The specific subject being graded
            'section', // The specific section being viewed
            'acadHistories', // Students in this section
            'grades', // Grades for THIS subject & section & faculty
            'allFacultySubjects' // Renamed from 'subjects' to avoid confusion
        ));
    }


    public function store_grade(Request $request)
    {

        if (!Auth::check() || !($faculty = Auth::user()->faculty)) {
            abort(403, 'Unauthorized action.');
        }
        $facultyId = $faculty->id;

        $validated = $request->validate([
            // Validate IDs needed to identify the correct grade record context
            'acad_history_id' => [
                'required',
                'integer',
                Rule::exists('acad_histories', 'id'),
            ],
            'subject_id' => 'required|integer|exists:subjects,id',
            'faculty_id' => [
                'required',
                'integer',
                Rule::in([$facultyId]),
                Rule::exists('faculties', 'id')
            ],

            'prelim'  => 'nullable|numeric|min:0|max:100',
            'midterm' => 'nullable|numeric|min:0|max:100',
            'final'   => 'nullable|numeric|min:0|max:100',
        ], [
            // Custom error messages
            'faculty_id.in' => 'Authorization mismatch. Cannot save grades.',
            '*.numeric' => 'Grade fields must contain only numbers.',
            '*.min' => 'Grade cannot be less than :min.',
            '*.max' => 'Grade cannot be greater than :max.',
        ]);

        try {
            Grade::updateOrCreate(
                [
                    // Attributes to find the existing record by:
                    'acad_history_id' => $validated['acad_history_id'],
                    'subject_id'      => $validated['subject_id'],
                    'faculty_id'      => $validated['faculty_id'], // Ensures faculty owns the grade record
                ],
                [
                    // Attributes to update or set on creation:
                    // Map form names ('prelim') to DB column names ('prelims')
                    // Use null coalescing (??) to avoid overwriting existing grades
                    // with null if the corresponding input was empty in the form.
                    'prelims' => $validated['prelim'] ?? null, // DB: prelims
                    'midterm' => $validated['midterm'] ?? null, // DB: midterm (matches)
                    'finals'  => $validated['final'] ?? null,  // DB: finals
                ]
            );

            // 4. Redirect Back with Success Message
            return redirect()->back()->with('success', 'Grades saved successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging


            // 5. Redirect Back with Error Message
            return redirect()->back()->with('error', 'An error occurred while saving grades. Please try again.');
        }
    }

    public function update_grade(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);

        $validated = $request->validate([
            'prelim' => 'nullable|numeric|min:0|max:100',
            'midterm' => 'nullable|numeric|min:0|max:100',
            'final' => 'nullable|numeric|min:0|max:100',
        ]);

        $grade->update([
            'prelims' => $validated['prelim'] ?? null,
            'midterm' => $validated['midterm'] ?? null,
            'finals'  => $validated['final'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Grades updated successfully!');
    }
}
