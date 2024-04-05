<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;



class FacultyController extends Controller
{
    public function create()
    {
        
    $departments = Department::all(); 
    return view('faculty.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'phone' => 'required|string|max:10', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('faculty.create')
                ->withErrors($validator)
                ->withInput();
        }

        Faculty::create($request->all());
        return redirect()->route('faculty.index')->with('success', 'Faculty member created successfully.');
    }

    
    public function index()
    {
        $faculty = Faculty::all();
        return view('faculty.index', compact('faculty'));
    }

    public function show(Faculty $faculty)
    {
        return view('faculty.show', compact('faculty'));
    }

    public function edit(Faculty $faculty)
    {
        $departments = Department::all();
        return view('faculty.edit', compact('faculty', 'departments'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $faculty->update($request->all());
        return redirect()->route('faculty.index')->with('success', 'Faculty member updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculty.index')->with('success', 'Faculty member deleted successfully.');
    }
}
