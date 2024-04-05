<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;

class DepartmentController extends Controller
{
    // Create
    public function create()
{
    $faculty = Faculty::all(); // Assuming Faculty is the model for your faculty members
    return view('departments.create', compact('faculty'));
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:30',
        'hod_id' => 'required|exists:faculty,id',
    ]);

    Department::create($validatedData);
    

    return redirect()->route('departments.index')->with('success', 'Department created successfully.');
}


// Read
public function index()
{

    $departments = Department::with('hod')->get();
    return view('departments.index', compact('departments'));
}

public function show(Department $department)
{
  
    $hod = $department->hod;
    return view('departments.show', compact('department', 'hod'));
}

// Update
public function edit(Department $department)
{
    
    $faculties = Faculty::all(); // Fetch all faculties
    return view('departments.edit', compact('department', 'faculties'));
}

public function update(Request $request, Department $department)
{
    $department->update($request->all());
    return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
}

// Delete
public function destroy(Department $department)
{
    $department->delete();
    return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
}

}
