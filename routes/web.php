<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

// Route for the public home page
Route::get('/', [HomeController::class, 'home'])->name('home');

// Additional public Blade pages
Route::get('/about', function () {
    return view('about'); // Ensure 'about.blade.php' exists
})->name('about');

Route::get('/contact', function () {
    return view('contact'); // Ensure 'contact.blade.php' exists
})->name('contact');

// Authenticated users middleware group for the dashboard
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// Authentication routes
Auth::routes(); // This includes login, registration, password reset routes

// Department routes
Route::resource('departments', DepartmentController::class)->except(['create', 'show']);
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');

// Faculty routes
Route::resource('faculty', FacultyController::class)->except(['edit', 'update', 'destroy']);
Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::get('/faculty/{faculty}', [FacultyController::class, 'show'])->name('faculty.show');
Route::get('/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
Route::put('/faculty/{faculty}', [FacultyController::class, 'update'])->name('faculty.update');
Route::delete('/faculty/{faculty}', [FacultyController::class, 'destroy'])->name('faculty.destroy');

// Student routes
Route::resource('students', StudentController::class)->except(['create', 'show']);
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Marks routes
Route::resource('marks', MarksController::class)->except(['create', 'show']);
Route::get('/marks/create', [MarksController::class, 'create'])->name('marks.create');
Route::get('/marks/{mark}', [MarksController::class, 'show'])->name('marks.show');

// Subject routes
Route::resource('subjects', SubjectController::class)->except(['create', 'show', 'update']);
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
