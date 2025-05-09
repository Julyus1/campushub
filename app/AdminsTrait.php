<?php

namespace App;

use App\Models\Student;
use App\Models\Section;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\AcadHistory;
use Illuminate\Validation\Rule;

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
        $students = Student::with(['latestAcadHistory.section'])
            ->orderBy('lastname', 'asc')
            ->paginate(20);
        return view($this->viewprefix() . 'studlist', ['students' => $students]);
    }
    public function create_stud()
    {
        $courses = Course::all();
        $sections = Section::all(); // or use Course::with('sections') if you want

        return view($this->viewprefix() . 'studentreg', compact('courses', 'sections'));
    }

    public function store_stud(Request $request)
    {
        $validated = $request->validate([
            'section_id'        => 'required|exists:sections,id',
            'year_level' => 'required|in:1st Year,2nd Year,3rd Year,4th Year',
            'course' => 'required|exists:courses,id',
            'semester' => 'required|in:1st Semester,2nd Semester',
            'email'             => 'required|email|unique:students,email',
            'firstname'         => 'required|string|max:255',
            'middlename'        => 'nullable|string|max:255',
            'lastname'          => 'required|string|max:255',
            'gender'            => 'required|in:Male,Female',
            'birthdate'         => 'required|date',
            'contact'           => 'nullable|string|max:20',
            'religion'          => 'required|string|max:255',
            'origin'            => 'nullable|string|max:255',
            'nationality'       => 'required|string|max:255',
            'civilstatus'       => 'required|in:Single,Married,Widowed',
            'birthplace'        => 'required|string|max:255',
            'stname'            => 'nullable|string|max:255',
            'brgy'              => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'province'          => 'required|string|max:255',
            'postalcode'        => 'nullable|string|max:10',
            'homenumber'        => 'nullable|string|max:20',
            'mobilenumber'      => 'required|string|max:20',
            'emergencyperson'   => 'required|string|max:255',
            'relationship'      => 'required|string|max:100',
            'emergencycontact'  => 'required|string|max:20',
        ]);
        DB::transaction(function () use ($validated) {
            // 1) Create the Student (exclude section_id and year_level)
            $studentData = Arr::except($validated, ['section_id', 'year_level', 'semester']);
            $student = Student::create($studentData);

            // 2) Create Academic History
            AcadHistory::create([
                'student_id' => $student->id,
                'section_id' => $validated['section_id'],
                'year'       => $validated['year_level'], // Moved here
                'semester'   => $validated['semester'], // Change this as needed or make it dynamic
            ]);
        });

        return redirect($this->redirectprefix() . 'student/register');
    }

    public function stud_profile(Student $student)
    {
        // Keep fetching courses for the modal dropdown
        $courses = Course::orderBy('title')->get();

        // Keep loading academic histories onto $student and assigning the result to $acad
        $acad =  $student->load('acadHistories.section');
        $sections = Section::all();

        // REMOVED: $sections = Section::all(); // This line is removed.

        // Pass the necessary data to the view, excluding the unnecessary 'sections' variable
        return view($this->viewprefix() . 'studdetail', [
            'student' => $student,
            'acads' => $acad,    // Keep passing $acad as you had it
            'courses' => $courses,
            'sections' => $sections // Keep passing $courses
            // REMOVED: 'sections'=>$sections // The 'sections' key-value pair is removed from this array
        ]);
    }
    public function stud_showupdate(Student $student)
    {
        $courses = Course::all();

        $sections = Section::all();
        return view($this->viewprefix() . 'studupdate', ['student' => $student, 'sections' => $sections, 'courses' => $courses]);
    }

    public function stud_update(Student $student, Request $request)
    {
        $validated = $request->validate([
            'section_id'        => 'required|exists:sections,id',
            'year_level'        => 'required|string|max:255',
            'course'            => 'required|string|max:255',
            'email'             => 'required|email|unique:students,email,' . $student->id,
            'firstname'         => 'required|string|max:255',
            'middlename'        => 'nullable|string|max:255',
            'lastname'          => 'required|string|max:255',
            'gender'            => 'required|in:Male,Female',
            'birthdate'         => 'required|date',
            'contact'           => 'nullable|string|max:20',
            'religion'          => 'required|string|max:255',
            'origin'            => 'nullable|string|max:255',
            'nationality'       => 'required|string|max:255',
            'civilstatus'       => 'required|in:Single,Married,Widowed',
            'birthplace'        => 'required|string|max:255',
            'stname'            => 'nullable|string|max:255',
            'brgy'              => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'province'          => 'required|string|max:255',
            'postalcode'        => 'nullable|string|max:10',
            'homenumber'        => 'nullable|string|max:20',
            'mobilenumber'      => 'required|string|max:20',
            'emergencyperson'   => 'required|string|max:255',
            'relationship'      => 'required|string|max:100',
            'emergencycontact'  => 'required|string|max:20',
        ]);

        DB::transaction(function () use ($validated, $student) {
            // Update student data (excluding section_id and year_level)
            $studentData = Arr::except($validated, ['section_id', 'year_level']);
            $student->update($studentData);

            // Update academic history (you may need logic to get the correct record)
            $history = AcadHistory::where('student_id', $student->id)->latest()->first();

            if ($history) {
                $history->update([
                    'section_id' => $validated['section_id'],
                    'year'       => $validated['year_level'],
                    'semester'   => '1st Semester',
                ]);
            } else {
                // Create new if no history exists
                AcadHistory::create([
                    'student_id' => $student->id,
                    'section_id' => $validated['section_id'],
                    'year'       => $validated['year_level'],
                    'semester'   => '1st Semester',
                ]);
            }
        });

        return redirect()->back()->with('success', 'Student details updated successfully!');
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



    public function store_acadhistory(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'semester'   => 'required|string|max:100', // Adjust max length if needed
            'year'       => 'required|string|max:100', // Adjust max length if needed
            // 'course_id' => 'required|integer|exists:courses,id', // Validate course exists (uncomment if using course_id)
            'section_id' => 'required|integer|exists:sections,id', // Validate section exists
            'student_id' => [ // Explicitly validate student_id from hidden input
                'required',
                'integer',
                Rule::exists('students', 'id')->where(function ($query) use ($student) {
                    // Ensure the student_id submitted matches the student in the URL
                    $query->where('id', $student->id);
                }),
            ],
            // Add validation for other fields if you uncomment them (e.g., schoolyear)
        ]);

        try {
            // 2. Create the Academic History record using the relationship
            // This automatically sets the student_id
            $student->acadHistories()->create([
                'semester'   => $validatedData['semester'],
                'year'       => $validatedData['year'],
                'section_id' => $validatedData['section_id'],
                // Add other fields here if needed
            ]);

            // 3. Redirect back to the student detail page with a success message
            return redirect()->route('students.show', $student->id)
                ->with('success', 'Academic record added successfully!');
        } catch (\Exception $e) {
            // Optional: Log the error for debugging


            // Redirect back with an error message
            return redirect()->back()
                ->with('error', 'Failed to add academic record. Please try again.');
        }
    }

    public function update_acadhistory(Request $request, AcadHistory $acadHistory)
    {
        $validatedData = $request->validate([
            'semester'   => 'required|string|max:100',
            'year'       => 'required|string|max:100',
            'section_id' => 'required|integer|exists:sections,id',
            'student_id' => [ // Optional but recommended check
                'required',
                'integer',
                Rule::exists('students', 'id')->where('id', $acadHistory->student_id),
            ],
            // 'course_id' => 'sometimes|required|integer|exists:courses,id', // Only if needed
        ]);

        // Prevent changing the student owner via hidden field manipulation
        if ((int)$request->input('student_id') !== $acadHistory->student_id) {

            return redirect()->route('students.show', $acadHistory->student_id)
                ->with('error', 'Update failed due to data mismatch.');
        }

        try {
            // Update the record with validated data
            $acadHistory->update([
                'semester'   => $validatedData['semester'],
                'year'       => $validatedData['year'],
                'section_id' => $validatedData['section_id'],
            ]);

            return redirect()->route('students.show', $acadHistory->student_id)
                ->with('success', 'Academic record updated successfully!');
        } catch (\Exception $e) {

            return redirect()->back()
                ->with('success', 'Updated record succesfully!');
        }
    }


    public function show_class_schedule()
    {
        // Fetch data you want to display in the scheduling page (optional for now)
        return view($this->viewprefix() . 'class-scheduling');
    }

}
