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
    public function show_grades(Section $section)
    {
        $section->load('course.department');
        $faculty = Auth::user()->faculty;

        $subjectIdsInSection = $section->subjects()->pluck('subjects.id'); // Get IDs from the 'subjects'
        $subject = Subject::where('faculty_id', $faculty->id)
            ->whereIn('id', $subjectIdsInSection)
            ->first();

        if (!$subject) {
            abort(404, 'No subject taught by you was found in this section.');
        }
        $subjects = $faculty->subjects()->with('sections')->get();
        $acadHistories = $section->acadHistories()
            ->with('student')
            ->get();
        $grades = Grade::where('subject_id', $subject->id)
            ->where('faculty_id', Auth::user()->faculty->id)
            ->get()
            ->keyBy('acad_history_id');

        return view('faculty.grade-system', compact('faculty', 'subject', 'section', 'acadHistories', 'grades', 'subjects'));
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
