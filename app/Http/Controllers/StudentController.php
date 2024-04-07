<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use Carbon\Carbon;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formattedDate = Carbon::now()->format('Y-m-d');

        
        $departments = Department::all();

        
        return view('students.create', compact('formattedDate', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

       
        $validatedData = $request->validate([
            'roll_num' => 'required|integer|unique:students',
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'department_id' => 'required|exists:departments,id',
            'phone' => 'required|string|max:10',
            'admission_date' => 'required|date',
            'cet_marks' => 'required|integer',
        ]);
    
        $student = new Student();
    
        $student->roll_num = $validatedData['roll_num'];
        $student->first_name = $validatedData['first_name'];
        $student->last_name = $validatedData['last_name'];
        $student->department_id = $validatedData['department_id'];
        $student->phone = $validatedData['phone'];
        $student->admission_date = $validatedData['admission_date'];
        $student->cet_marks = $validatedData['cet_marks'];
    
      
        $student->save();
    
       
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all();
        return view('students.edit', compact('student', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    
    $validatedData = $request->validate([
        'roll_num' => 'required|integer|unique:students,roll_num,'.$id.',roll_num',
        'first_name' => 'required|string|max:25',
        'last_name' => 'required|string|max:25',
        'department_id' => 'required|exists:departments,id',
        'phone' => 'required|string|max:10',
        'admission_date' => 'required|date',
        'cet_marks' => 'required|integer',
    ]);

   

    $existingStudent = Student::where('roll_num', $validatedData['roll_num'])
                              ->where('roll_num', '<>', $id)
                              ->first();
     
    if ($existingStudent) {
         
        return redirect()->back()->withInput()->with('error', 'The roll number already exists.');
    }

    
    Student::where('roll_num', $id)->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
