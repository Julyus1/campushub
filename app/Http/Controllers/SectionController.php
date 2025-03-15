<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Course;

class SectionController extends Controller
{
    //
    public function show()
    {
        $sections = Section::with('course')->get();
        $courses = Course::all();
        return view('admin.section', compact('sections', 'courses'));
    }

    public function store(Request $request)
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

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully!');
    }
}
