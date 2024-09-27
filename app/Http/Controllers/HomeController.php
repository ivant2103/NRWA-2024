<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty; // Ensure this model is correctly set up with the correct table name
use App\Models\Subject; // Ensure this model exists and is correctly set up
use App\Models\Student; // Assuming this model exists
use App\Models\Mark; // Assuming this model exists

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Only apply auth middleware to the dashboard, not the public home page
        $this->middleware('auth')->only('dashboard');
    }

    /**
     * Show the public home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
{
    $faculties = Faculty::with('department')->get(); // Eagerly load department if necessary
    $subjects = Subject::all();
    $students = Student::all();
    $marks = Mark::with(['student', 'subject'])->get(); // Eager load student and subject

    return view('home', compact('faculties', 'subjects', 'students', 'marks'));
}


    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard'); // Authenticated users' dashboard view
    }
}
