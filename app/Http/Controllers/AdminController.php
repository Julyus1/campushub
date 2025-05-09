<?php

namespace App\Http\Controllers;

use App\AdminsTrait;
use Illuminate\Http\Request;
use App\Models\Subject;




class AdminController extends Controller
{
    use AdminsTrait;
    //

    public function index()
    {
        return view('admin.index');
    }

    public function show_class_schedule()
    {
        $schedules = \App\Models\ClassSchedule::with('subject')->get();
        $subjects = Subject::all();
        return view('admin.class-scheduling', compact('schedules', 'subjects'));
    }
    public function store_class_schedule(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        ClassSchedule::create($validated);

        return redirect()->back()->with('success', 'Class schedule added successfully.');
    }
}
