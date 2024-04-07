<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::all();
        return view('marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $students = Student::all();
        $subjects = Subject::all();
        return view('marks.create', compact('students', 'subjects'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,roll_num',
            'subject_id' => 'required|exists:subjects,id',
            'marks' => 'required|integer',
        ]);

        Mark::create($validatedData);

        return redirect()->route('marks.index')->with('success', 'Mark created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mark = Mark::findOrFail($id);
        return view('marks.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mark = Mark::findOrFail($id);
        $students = Student::all();
        $subjects = Subject::all();
        return view('marks.edit', compact('mark', 'students', 'subjects'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,roll_num',
            'subject_id' => 'required|exists:subjects,id',
            'marks' => 'required|integer',
        ]);

        $mark = Mark::findOrFail($id);
        $mark->update($validatedData);

        return redirect()->route('marks.index')->with('success', 'Mark updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mark::findOrFail($id)->delete();
        return redirect()->route('marks.index')->with('success', 'Mark deleted successfully.');
    }
}
