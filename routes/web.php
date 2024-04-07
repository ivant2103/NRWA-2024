<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Authentication routes
Auth::routes(['register' => false]);

// Department routes
Route::resource('departments', DepartmentController::class)->except(['create', 'show']);
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');

// Faculty routes
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::post('/faculty', [FacultyController::class, 'store'])->name('faculty.store');
Route::get('/faculty/{faculty}', [FacultyController::class, 'show'])->name('faculty.show');
Route::get('/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
Route::put('/faculty/{faculty}', [FacultyController::class, 'update'])->name('faculty.update');
Route::delete('/faculty/{faculty}', [FacultyController::class, 'destroy'])->name('faculty.destroy');

//Student routes
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::resource('students', StudentController::class)->except(['create', 'show']);

//Marks routes
Route::get('/marks/create', [MarksController::class, 'create'])->name('marks.create');
Route::get('/marks/{mark}', [MarksController::class, 'show'])->name('marks.show');
Route::resource('marks', MarksController::class)->except(['create', 'show']);

//Subject routes
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::resource('subjects', SubjectController::class)->except(['create', 'show', 'update']);